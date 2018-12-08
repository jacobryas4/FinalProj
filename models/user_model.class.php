<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Ryan Byrd
 * 11/20/2018
 * user_model.class.php
 * PHP and SQL interactivity so that various user funnctions actually work
 */
Class UserModel {
// attributes for running SQL statements in PHP off of the MariaDB database
    private $db;
    private $dbConnect;
// constructor for calling up the database
    public function __construct() {
        // $this->db = Database::getDatabase();
        // $this->dbConnect = $this->db->getConnection();
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblAccount = $this->db->getAccountTable();
        $this->tblTransactions = $this->db->getTransactionTable();
    }
//add a user into the database
    public function add_user() {
//retrieve password, then remove white space, filter, and sanitize
        $pw = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
//function to hash the password
        $hash_pw = password_hash($pw, PASSWORD_DEFAULT);
//retrieve all attributes from the user input form
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $balance = filter_input(INPUT_POST, "balance", FILTER_SANITIZE_NUMBER_FLOAT);
        try{
            if (empty($username) || empty($email)){
                throw new DataMissingException("Values were missing in one or more fields");
            }
              //check for proper email formatting
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new EmailException("Your email format was invalid");
            }
            if (strlen($pw) < 5) {
                throw new DataLengthException("Minimum password length is 5");          
            }
//construct an INSERT query
            $sql = "INSERT INTO " . $this->db->getAccountTable() . " VALUES(NULL, '$email', '$username', '$hash_pw', 0, 1)";
    //execute the query and return true if successful or false if failed
            if ($this->dbConnection->query($sql) === FALSE) {
                throw new DatabaseException("We cannot create your account at the moment.");
            }
            return $this->dbConnection->query($sql);
        } catch (DataMissingException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        } catch (DatabaseException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        } catch (EmailException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        } catch (DataLengthException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        } catch (Exception $e){
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        }
    }
//make sure that the user's name exists. For the password, test it against the hashed password
    // public function verify_user() {

    //     $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    //     $pw = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    //     //filter table data by username
    //     $sql = "SELECT password FROM " . $this->db->getAccountTable() . " WHERE username='$username'";

    //     //Run SQL statement
    //     $query = $this->dbConnection->query($sql);

    //     //set a cookie if the password is verified
    //     if ($query AND $query->num_rows > 0) {
    //         $result_row = $query->fetch_assoc();
    //         $hash = $result_row['password'];
    //         if (password_verify($pw, $hash)) {
    //             setcookie("user", $username);
    //             return true;
    //         }
    //     }

    //return false if credentials are rejected (user does not log in)
    //     return false;
    // }

    //make sure that the user's name exists. For the password, test it against the hashed password
    public function verify_user() {
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $pw = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        
        try{
            //check for empty fields
            if (empty($username) || empty($pw)) {
                throw new DataMissingException("Values were missing in one or more fields");
            }    
            //filter table data by username
            $sql = "SELECT password, role, account_id FROM " . $this->db->getAccountTable() . " WHERE username='$username'";
            //Run SQL statement
            $query = $this->dbConnection->query($sql);
            
            if (!$query) {
                throw new DatabaseException("We couldnt verify your account at this moment");
            }
            //set a cookie if the password is verified
            if ($query AND $query->num_rows > 0) {
                $result_row = $query->fetch_assoc();
                //retrieve the value of role from the row the user invoked
                $role = $result_row['role'];
                //retrieve the value of the user's unique account ID to call up data
                $id = $result_row['account_id'];
                //set a cookie to the role according to the user's name
                setcookie("role", $role, 0, '/');
                //assign the cookie to the variable role so that this information is immediately detected on the page.
                $_COOKIE['role'] = $role;
                $hash = $result_row['password'];
                if (password_verify($pw, $hash)) {
                    setcookie("username", $username, 0, '/');
                    //make the website display who is logged in from the header
                    $_COOKIE['username'] = $username;
                    setcookie("id", $id, 0, '/');
                    $_COOKIE['id'] = $id;

                    return true;
                } else {
                    throw new DatabaseException("Your login is invalid");
                }
            } else {
                throw new DatabaseException("Your login is invalid");
            }
    //return false if credentials are rejected (user does not log in)
            return false;
        } catch (DataMissingException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        } catch (DatabaseException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        } catch (Exception $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        }
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
    $id = "id";
    unset($_COOKIE[$id]);
    $id = setcookie($id, '', time() - 3600, '/');
    return true;
}

//--------------METHOD NOT USED----------------------
//reset password
    public function reset_password() {
        
//retrieve username and password from a form
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $pw = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
//hash the password
        $hash_pw = password_hash($pw, PASSWORD_DEFAULT);
//the sql statement for update
        $sql = "UPDATE  " . $this->db->getUserTable() . " SET password='$hash_pw' WHERE username='$username'";
//execute the query
        $query = $this->dbConnection->query($sql);
//return false if no rows were affected
        if (!$query || $this->dbConnection->affected_rows == 0) {
            return false;
        }
        return true;
    }

       //list all transactions
       public function list_transactions($id) {
        //        $sql = "SELECT * FROM " . $this->tblTransaction . "WHERE username='$username'";
                //the select ssql statement
           try{
                    $sql = "SELECT * " . "FROM " . $this->tblTransactions . " WHERE account_id=" . $id;
                    //execute the query
                    $query = $this->dbConnection->query($sql);
                    // if the query failed, return false. 
                    if (!$query) {
                        throw new DatabaseException("Could not load transactions at this time");
                    }
                    //if the query succeeded, but no accounts were found.
                    if ($query->num_rows == 0) {

                        return "none";
                    }
                    //search succeeded, and found at least 1 account
                    //create an array to store all the returned accounts
                    $transactions = array();
                    //loop through all rows in the returned recordsets
                    while ($obj = $query->fetch_object()) {
                        $transaction = new Transaction($obj->transaction_id, $obj->amount, $obj->transaction_type, $obj->date_of_transaction, $obj->recipient);
                        //set the id for the account
                        //$transaction->setTransaction_id($obj->Transaction_id);
                        //add the account into the array
                        $transactions[] = $transaction;
                    }
                    return $transactions;
            } catch (DatabaseException $e) {
                $c = new UserController();
                $c->error($e->getMessage());
                exit;
            } catch (Exception $e) {
                $c = new UserController();
                $c->error($e->getMessage());
                exit;
            }
        }



            // searches for accounts that match a certain criteria
    public function search_transaction($terms) {
        
        $terms = explode(" ", $terms); // put multiple terms into an array
        
        // select statement for AND search
        $sql = "SELECT * FROM " . $this->tblTransactions . " WHERE recipient LIKE ";
        
        if (sizeof($terms) === 1) {
            
            $sql .= "'%$terms[0]%' AND account_id = '" . $_COOKIE['id'] . "'";
            
        } else if (sizeof($terms) === 2) {
            
            $sql .= "'%$terms[0]%' OR recipient LIKE '%$terms[1]%' AND account_id = '" . $_COOKIE['id'] . "'";;
            
        } else if (sizeof($terms === 3)) {
            $sql .= "'%$terms[0]%' OR recipient LIKE '%$terms[1]%' OR recipient LIKE '%$terms[2]%' AND account_id = '" . $_COOKIE['id'] . "'";;
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
        $transactions = array();
        
        // loop through all rows in returned data
        // still need to finish this, may have to vary a bit from kung fu panda
        while($obj = $query->fetch_object()) {
            $transaction = new Transaction($obj->transaction_id, $obj->amount, $obj->transaction_type, $obj->date_of_transaction, $obj->recipient);
            
            // set the id for the account
            //$account->setAccount_id($obj->id);
            
            // add accounts to array
            $transactions[] = $transaction;
        }
        return $transactions;        
        
    }
        
}