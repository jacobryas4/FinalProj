<?php

/*
 * Ryan Byrd
 * 11/9/2018
 * database.class.php
 * Database class for managing MariaDB.
 * Login uses a root with no password
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'first_db',
        'tblAccounts' => 'account',
        'tblBalance' => 'balance',
    );
 
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }
    
    //returns the name of the table that stores accounts
    public function getAccountTable() {
        return $this->param['tblAccounts'];
    }

    //returns the name of the table that stores user balances
    public function getBalanceTable() {
        return $this->param['tblBalance'];
    }

}
