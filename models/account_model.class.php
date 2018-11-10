<?php

/*
 * Ryan Byrd
 * 11/9/2018
 * account_model.class.php
 * Stores SQL syntax that allows the user to manage their account credentials.
 * This should output a table to view everyone's username, email, and password by an admin
 */

class AccountModel {

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

    //static method to ensure there is just one AccountModel instance
    public static function getAccountModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new AccountModel();
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
        if (!$query)
            return false;

        //if the query succeeded, but no accounts were found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 account
        //create an array to store all the returned accounts
        $accounts = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $account = new Account($obj->account_id, $obj->email, $obj->username, $obj->password);

            //set the id for the book
            $account->setId($obj->id);

            //add the book into the array
            $accounts[] = $account;
        }
        return $accounts;
    }

}
