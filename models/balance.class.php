<?php

/*
 * Ryan Byrd
 * 11/9/2018
 * balance.class.php
 * A class for managing a user account's transactions
 */

class Balance extends Account {

    private $balance_id;
    private $balance_total;
    private $last_update;

    public function __construct($balance_id, $balance_total, $last_update) {
        parent::__construct($account_id, $email, $username, $password);
        $this->balance_id = $balance_id;
        $this->balance_title = $balance_total;
        $this->last_update = $last_update;
    }

    //getter methods to retrieve data
    public function getBalance_id() {
        return $this->balance_id;
    }

    public function getBalance_title() {
        return $this->balance_title;
    }

    public function getLast_update() {
        return $this->last_update;
    }

    //method for calculating the value of bitcoins to US dollars
    public function getCoinToDollar() {

        //conversion factor for BTC to dollar as of 11/9/2018
        return $this->balance_total * 6636.24;
    }

    //method for calculating the value of bitcoins to Euros
    public function getCoinToEuro() {

        //conversion factor for BTC to Euro 11/9/2018
        return $this->balance_total * 5588.55;
    }

    //method for calculating the value of bitcoins to Japanese Yen
    public function getCoinToYen() {

        //conversion BTC to Yen 11/9/2018
        return $this->balance_total * 721228.02;
    }

    //method for calculating the value of bitcoins to Russion Ruble
    public function getCoinToRuble() {

        //convert BTC to Ruble 11/9/2018
        return $this->balance_total * 430341.80;
    }

    //setter for balance id
    public function setBalance_id($balance_id) {
        $this->balance_id = $balance_id;
    }

}
