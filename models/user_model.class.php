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
//construct an INSERT query
        $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES(NULL, '$email', '$username', '$hash_pw', '$balance')";
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
        $sql = "SELECT password FROM " . $this->db->getAccountTable() . " WHERE username='$username'";
//Run SQL statement
        $query = $this->dbConnection->query($sql);
//set a cookie if the password is verified
        if ($query AND $query->num_rows > 0) {
            $result_row = $query->fetch_assoc();
            $hash = $result_row['password'];
            if (password_verify($pw, $hash)) {
                setcookie("user", $username);
                return true;
            }
        }
//return false if credentials are rejected (user does not log in)
        return false;
    }
//timeout the user's cookie when they press the logout button
    public function logout() {
        
//the -10 is to destroy session cookie; the empty string eliminates user data
        setcookie("user", '', -10);
        return true;
    }
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
                $sql = "SELECT * " . "FROM " . $this->tblTransactions . " WHERE account_id=" . $id;
                //execute the query
                $query = $this->dbConnection->query($sql);
                // if the query failed, return false. 
                if (!$query) {
                    return false;
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
                    $transaction = new Transaction($obj->transaction_id, $obj->amount, $obj->transaction_type, $obj->date_of_transaction);
                    //set the id for the account
                    //$transaction->setTransaction_id($obj->Transaction_id);
                    //add the account into the array
                    $transactions[] = $transaction;
                }
                return $transactions;
            }
        
}