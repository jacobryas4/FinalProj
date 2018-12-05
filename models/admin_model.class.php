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

        try{
            $sql = "SELECT * FROM " . $this->tblAccount;

            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false. 
            if (!$query) {
                throw new DatabaseException("The query failed");
            }
            //if the query succeeded, but no accounts were found.
            if ($query->num_rows == 0) {
                throw new DatabaseException("No accounts were found");
            }
            //search succeeded, and found at least 1 account
            //create an array to store all the returned accounts
            $accounts = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $account = new Account($obj->account_id, $obj->email, $obj->username, $obj->balance, $obj->password);

                //set the id for the account
                $account->setAccount_id($obj->account_id);

                //add the account into the array
                $accounts[] = $account;
            }

            return $accounts;
        } catch(DatabaseException $e){
            $c = new AdminController();
            $c->error($e->getMessage());
            exit; 
        } catch(Exception $e){
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        }

        
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
            $account = new Account($obj->account_id, $obj->email, $obj->username, $obj->balance, $obj->password);

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
                " WHERE account_id=" . $id ;

        try{
            //execute the query
            $query = $this->dbConnection->query($sql);

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                //create a account object
                $account = new Account(
                        stripslashes($obj->account_id), stripslashes($obj->email), stripslashes($obj->username), stripslashes($obj->password), stripslashes($obj->balance));

                //set the id for the account
                //$account->setId($obj->id);

                return $account;
            }

            throw new DatabaseException("Could not load account");
        } catch (DatabaseException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (Exception $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        }


        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a account object
            $account = new Account(
                    stripslashes($obj->account_id), stripslashes($obj->email), stripslashes($obj->username), stripslashes($obj->password), stripslashes($obj->balance));

            //set the id for the account
            //$account->setId($obj->id);

            return $account;
        }
        
        return false;

    }

    //update account method to adjust sample data about a user
    public function update_account($id) {

        try {
            //check if data was received, end the program if it was not.
            if (!filter_has_var(INPUT_POST, 'balance') ||
                    !filter_has_var(INPUT_POST, 'email') ||
                    !filter_has_var(INPUT_POST, 'username') ||
                    !filter_has_var(INPUT_POST, 'password')) {

                throw new DataMissingException("Recieved incomplete or missing data");
            }

            //retrieve data for the new account; data are sanitized and escaped for security.
            $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
            $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
            // $password = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
            $balance = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'balance', FILTER_DEFAULT));

            //query string for update 
            $sql = "UPDATE " . $this->tblAccount .
                    " SET email='$email', username='$username', balance='$balance'"
                    . " WHERE account_id='$id'";

            //execute the query
            if ($this->dbConnection->query($sql)) {
                
                return $this->dbConnection->query($sql);
            } else {
                var_dump($sql);
                throw new DatabaseException("Couldnt access the database or bad statement");
            }
        } catch (DatabaseException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (Exception $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        }

        //check if data was received, end the program if it was not.
        
        if (!filter_has_var(INPUT_POST, 'password') ||
                !filter_has_var(INPUT_POST, 'email') ||
                !filter_has_var(INPUT_POST, 'username') ||
                !filter_has_var(INPUT_POST, 'balance')) {

            return false;
        }

        //retrieve data for the new account; data are sanitized and escaped for security.
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $balance = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'balance', FILTER_DEFAULT));

        //query string for update 
        $sql = "UPDATE " . $this->tblAccount .
                " SET email='$email', username='$username', balance='$balance'"
                . "WHERE account_id='$id'";
        
        //execute the query
        return $this->dbConnection->query($sql);

    }
    
    // searches for accounts that match a certain criteria
    public function search_account($terms) {
        
        $terms = explode(" ", $terms); // put multiple terms into an array
        
        // select statement for AND search
        $sql = "SELECT * FROM " . $this->tblAccount . " WHERE username LIKE ";
        
        if (sizeof($terms) === 1) {
            
            $sql .= "'%$terms[0]%'";
            
        } else if (sizeof($terms) === 2) {
            
            $sql .= "'%$terms[0]%' OR username LIKE '%$terms[1]%'";
            
        } else if (sizeof($terms === 3)) {
            $sql .= "'%$terms[0]%' OR username LIKE '%$terms[1]%' OR username LIKE '%$terms[2]%'";
        }   
        
//        // add terms to sql statement if necessary
//        if (sizeof($terms) === 1) {
//            $sql .= "LIKE " . "'%" . $terms[0] . "%'";
//        } else {
//            foreach($terms as $term) {
//                $sql .= "REGEXP%" . $term . "%" . "' OR username LIKE '" . $term . "'";
//            }
//        }
            
       
        
        
        
        
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
            $account = new Account($obj->account_id, $obj->email, $obj->username, $obj->balance, $obj->password);
            
            // set the id for the account
            //$account->setAccount_id($obj->id);
            
            // add accounts to array
            $accounts[] = $account;
        }
        return $accounts;        
        
    }
    
    // add a new account
    public function add_account() {
        // if the script did not receive post data, display error and terminate

        if (!filter_has_var(INPUT_POST, 'username') ||
                !filter_has_var(INPUT_POST, 'password') ||
                !filter_has_var(INPUT_POST, 'email') ||
                !filter_has_var(INPUT_POST, 'balance') ||
                !filter_has_var(INPUT_POST, 'role')) {
        
            return false;
        }
        

        // retrieve info for the new account. Sanitize data and escape for security
        // $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        // $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        // $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
        // $balance = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'balance', FILTER_DEFAULT)));
        // $role = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'role', FILTER_DEFAULT)));

        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
        $balance = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'balance', FILTER_DEFAULT)));
        $role = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'role', FILTER_DEFAULT)));


        try {
            //check for empty fields
            if (empty($username) || empty($password) || empty($email) || empty($balance) || empty($role)) {
                throw new DataMissingException("Values were missing in one or more fields.");
            }
            //check for proper password length
            if (strlen($password) < 5) {
                throw new DataLengthException("Minimum password length is 5");
            }
            //check for proper email formatting
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new EmailException("Your email format was invalid");
            }
            //hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //check for valid balance input
            if ($balance < 0) {
                throw new LessThanZeroException("Balance must be more than zero");
            }
            if (!filter_var($balance, FILTER_VALIDATE_FLOAT)) {
                throw new BalanceTypeException("Balance must be a number");
            }

            //construct INSERT query
            $sql = "INSERT INTO " . $this->tblAccount . " (email, username, password, balance, role) VALUES ('" .
                    $email . "', '" . $username . "', '" . $hashed_password . "', '" . $balance . "', '" . $role . "');";
            //check for valid DB connection
            if ($this->dbConnection->query($sql) === FALSE) {
                throw new DatabaseException("We cannot create your account at the moment.");
            }
            // execute query
            return $this->dbConnection->query($sql);
        } catch (DataMissingException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (DataLengthException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (EmailException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (DatabaseException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (LessThanZeroException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (BalanceTypeException $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        } catch (Exception $e) {
            $c = new AdminController();
            $c->error($e->getMessage());
            exit;
        }
    }


        
        // query string for add
        // $sql = "INSERT INTO " . $this->tblAccount . " (email, username, password, balance, role) VALUES ('" . 
        //         $email . "', '" . $username . "', '" . $password . "', '" . $balance . "', '" . $role . "');";
        
        // execute query
        // return $this->dbConnection->query($sql);
    

}
