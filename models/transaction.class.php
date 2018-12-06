<?php

/*
 * Ryan Byrd
 * 12/4/2018
 * transaction.class.php
 * Set Get methods for the attributes related to the Transactions a user performs
 */

class Transaction {

    private $transaction_id;
    private $amount;
    private $transaction_type;
    private $date_of_transaction;
    private $recipient;

    public function __construct($transaction_id, $amount, $transaction_type, $date_of_transaction, $recipient) {
        $this->transaction_id = $transaction_id;
        $this->amount = $amount;
        $this->transaction_type = $transaction_type;
        $this->date_of_transaction = $date_of_transaction;
        $this->recipient = $recipient;
    }

    public function getTransaction_id() {
        return $this->transaction_id;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getTransaction_type() {
        return $this->transaction_type;
    }

    public function getDate_of_transaction() {
        return $this->date_of_transaction;
    }

    public function getRecipient(){
        return $this->recipient;
    }

}
