<?php

/*
 * In its current state, this file is just a copy of the AccountModel class. 
 * 11/20/2018
 */

/**
 * Description of admin_model
 *
 * @author jacobbryant
 */
class AdminModel {
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblAccount;

    //To use singleton pattern, this constructor is made private.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblAccount = $this->db->getAccountTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one AdminModel instance
    public static function getAdminModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new AdminModel();
        }
        return self::$_instance;
    }

    //the list_account method is intended to be an admin only feature that allows for viewing all people registered on the site
    //monetary possessions are not included in the account table

    public function list_account() {
        
        $sql = "SELECT * FROM " . $this->tblAccount;
       
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
        $accounts = array();
        
        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $account = new Account($obj->account_id, $obj->email, $obj->username, $obj->password);

            //set the id for the account
            $account->setAccount_id($obj->account_id);

            //add the account into the array
            $accounts[] = $account;
        }
        
        return $accounts;
    }

    //display an individual account
    public function view_account($id) {

        //the select sql statement
        $sql = "SELECT * "
                . "FROM " . $this->tblAccount .
                " WHERE " . $this->tblAccount . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a account object
            $account = new Account(
                    stripslashes($obj->account_id), stripslashes($obj->email), stripslashes($obj->username), stripslashes($obj->password));

            //set the id for the account
            $account->setId($obj->id);

            return $account;
        }

        return false;
    }

    //update account method to adjust sample data about a user
    public function update_account($id) {
        //check if data was received, end the program if it was not.
        if (!filter_has_var(INPUT_POST, 'account_id') ||
                !filter_has_var(INPUT_POST, 'email') ||
                !filter_has_var(INPUT_POST, 'username') ||
                !filter_has_var(INPUT_POST, 'password')) {

            return false;
        }

        //retrieve data for the new account; data are sanitized and escaped for security.
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

        //query string for update 
        $sql = "UPDATE " . $this->tblAccount .
                " SET email='$email', username='$username', password='$password'"
                . "WHERE id='$id'";

        //execute the query
        return $this->dbConnection->query($sql);
    }
    
    // searches for accounts that match a certain criteria
    public function search_account($terms) {
        
        $terms = explode(" ", $terms); // put multiple terms into an array
        
        // select statement for AND search
        $sql = "SELECT * FROM " . $this->tblAccount . " WHERE username LIKE " . "'";
        
        
        foreach($terms as $term) {
            $sql .= "%" . $term . "%" . "'";
        }
        
        // execute query
        $query = $this->dbConnection->query($sql);
       
        // if search failed return false
        if(!$query) {
            
            return false;
        }
        
        // if search succeeded but no movie was found
        if($query->num_rows == 0) {
            return 0;
        }
        
        // search success and found a match
        // create an array to store matches
        $accounts = array();
        
        // loop through all rows in returned data
        // still need to finish this, may have to vary a bit from kung fu panda
        while($obj = $query->fetch_object()) {
            $account = new Account($obj->account_id, $obj->email, $obj->username, $obj->password);
            
            // set the id for the account
            //$account->setAccount_id($obj->id);
            
            // add accounts to array
            $accounts[] = $account;
        }
        return $accounts;        
        
    }
}
