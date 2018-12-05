<?php

/*
 * Ryan Byrd
 * 11/20/2018
 * user_model.class.php
 * PHP and SQL interactivity so that various user functions actually work
 */

Class UserModel {

// attributes for running SQL statements in PHP off of the MariaDB database
    private $db;
    private $dbConnect;
    static private $_instance = NULL;
    private $tblUser;

// constructor for calling up the database
    public function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblAccounts = $this->db->getUserTable();

//        protect against SQL injection with a real_escape_string statement
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //protect against special characters being used in an SQL statement
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one AccountModel instance
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

//add a user into the database
    public function add_user() {

//retrieve password, then remove white space, filter, and sanitize
        $pw = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

//function to hash the password
        $hash_pw = password_hash($pw, PASSWORD_DEFAULT);

//retrieve all attributes from the user input form
        $account_id = filter_input(INPUT_POST, "account_id", FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $balance = filter_input(INPUT_POST, "balance", FILTER_SANITIZE_NUMBER_FLOAT);
        $role = 1;

//construct an INSERT query
        $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES('$account_id', '$email', '$username', '$hash_pw', '$balance', '$role')";

//execute the query and return true if successful or false if failed
        if ($this->dbConnection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

//make sure that the user's name exists. For the password, test it against the hashed password
    public function verify_user() {

        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $pw = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

//filter table data by username
        $sql = "SELECT password, role FROM " . $this->db->getUserTable() . " WHERE username='$username'";

//Run SQL statement
        $query = $this->dbConnection->query($sql);

//set a cookie if the password is verified
        if ($query AND $query->num_rows > 0) {
            $result_row = $query->fetch_assoc();

            //retrieve the value of role from the row the user invoked
            $role = $result_row['role'];

            //set a cookie to the role according to the user's name
            setcookie("role", $role, 0, '/');

            //assign the cookie to the variable role so that this information is immediately detected on the page.
            $_COOKIE['role'] = $role;

            $hash = $result_row['password'];
            if (password_verify($pw, $hash)) {
                setcookie("username", $username, 0, '/');

                //make the website display who is logged in from the header
                $_COOKIE['username'] = $username;
                return true;
            }
        }

//return false if credentials are rejected (user does not log in)
        return false;
    }

//timeout the user's cookie when they press the logout button
    public function logout() {

        //unset the username so the user may log out
        $username = "username";
        unset($_COOKIE[$username]);
        $username = setcookie($username, '', time() - 3600, '/');

        //unset the role so the user may log out
        $role = "role";
        unset($_COOKIE[$role]);
        $role = setcookie($role, '', time() - 3600, '/');

        return true;
    }

    //list all transactions
    public function list_transactions() {
        
        
        $sql = "SELECT * FROM " . $this->tblTransaction . "WHERE username='$username'";
       
        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false. 
        if (!$query) {
            return false;
        }
        //if the query succeeded, but no accounts were found.
        if ($query->num_rows == 0) {
            return 0;
        }
        
        //search succeeded, and found at least 1 account
        //create an array to store all the returned accounts
        $transactions = array();
        
        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $transaction = new Transaction($obj->transaction_id, $obj->amount, $obj->transaction_type, $obj->date_of_transaction);

            //set the id for the account
            $transaction->setTransaction_id($obj->Transaction_id);

            //add the account into the array
            $transactions[] = $transaction;
        }
        
        return $transactions;
    }
}
