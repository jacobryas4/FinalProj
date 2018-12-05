<?php

/*
 * Ryan Byrd
 * 11/9/2018
 * account.class.php
 * A class labeling the user account and its attributes
 */

class Account {

    //private attributes
    private $account_id;
    private $email;
    private $username;
    private $password;
    private $balance;

    public function __construct($account_id, $email, $username, $balance, $password) {
        $this->account_id = $account_id;
        $this->email = $email;
        $this->username = $username;
        $this->balance = $balance;
        $this->password = $password;
        
    }

    //getter methods for retrieving attributes
    public function getAccount_id() {
        return $this->account_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function getBalance() {
        return $this->balance;
    }

    //setter for the id
    public function setAccount_id($account_id) {
        $this->account_id = $account_id;
    }

}
