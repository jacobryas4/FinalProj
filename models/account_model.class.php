<?php

/*
 * Ryan Byrd
 * 11/9/2018
 * account_model.class.php
 * Stores SQL syntax that allows the user to manage their account credentials.
 */

class AccountModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblAccount;
    private $tblBalance;

    //To use singleton pattern, this constructor is made private.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblAccount = $this->db->getAccountTable();


}
