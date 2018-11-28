<?php

/*
 * This class is for the Admin account of the site.
 * In its current state, it is basically a copy of 
 * the 'Account' class.  New methods will have to be added to 
 * specifiy actions inherent to the admin role. 
 * 11/20/18
 */

/**
 * Description of admin
 *
 * @author jacobbryant
 */
class Admin {
    //private attributes
    private $account_id;
    private $email;
    private $username;
    private $password;

    public function __construct($account_id, $email, $username, $password) {
        $this->account_id = $account_id;
        $this->email = $email;
        $this->username = $username;
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

    //setter for the id
    public function setAccount_id($account_id) {
        $this->account_id = $account_id;
    }
}
