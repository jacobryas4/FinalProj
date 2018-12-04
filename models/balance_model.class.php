<?php

/*
 * Ryan Byrd
 * 11/9/2018
 * balance_model.class.php
 * Balance Model class to allow the user to manage their account
 */

class BalanceModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblBalance;

    //To use singleton pattern, this constructor is made private.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBalance = $this->db->getBalanceTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one BalanceModel instance
    public static function getBalanceModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new BalanceModel();
        }
        return self::$_instance;
    }

    //list_balance method allows an admin to see how much money everyone's acount has
    public function list_balance() {
        try{
            $sql = "SELECT * FROM " . $this->tblBalance;

            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false. 
            if (!$query)
                throw new DatabaseException("The query failed");

            //if the query succeeded, but no balances were found.
            if ($query->num_rows == 0)
                throw new DatabaseException("No balances were found");

            //create an array to store all the returned balances
            $balances = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $balance = new Balance($obj->balance_id, $obj->balance_total, $obj->last_update);

                //set the id for the balance
                $balance->setId($obj->id);

                //add the balance into the array
                $balances[] = $balance;
            }
            return $balances;
        }catch(DatabaseException $e){
            $c = new UserController();
            $c->error($e->getMessage());
            exit;              
        }
    }

    //display an individual balance
    public function view_balance($id) {

        //the select sql statement
        $sql = "SELECT * "
                . "FROM " . $this->tblBalance .
                " WHERE " . $this->tblBalance . ".id='$id'";
        try{
            //execute the query
            $query = $this->dbConnection->query($sql);

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                //create a balance object
                $balance = new Balance(
                        stripslashes($obj->balance_id), stripslashes($obj->balance_total), stripslashes($obj->last_update));

                //set the id for the balance
                $balance->setId($obj->id);

                return $balance;
            }

            throw new DatabaseException("Could not load balance");
        } catch (DatabaseException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;  
        }
    }    
        
    //update balance method to adjust sample data about a user
    public function update_balance($id) {
        try{
            //check if data was received, end the program if it was not.
            if (!filter_has_var(INPUT_POST, 'balance_id') ||
                    !filter_has_var(INPUT_POST, 'balance_total') ||
                    !filter_has_var(INPUT_POST, 'last_update')) {

                throw DataMissingException("Recieved incomplete or missing data");
            }

            //retrieve data for the new balance; data are sanitized and escaped for security.
            $balance_total = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'balance_total', FILTER_SANITIZE_STRING)));
            $last_update = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'last_update', FILTER_SANITIZE_STRING)));

            //query string for update 
            $sql = "UPDATE " . $this->tblBalance .
                    " SET balance_total='$balance_total', last_update='$last_update'"
                    . "WHERE id='$id'";

            //execute the query
            if ($this->dbConnection->query($sql)) {
                return $this->dbConnection->query($sql);
            } else {
                throw new DatabaseException("Couldnt access the database or bad statement");
            }
        } catch (DatabaseException $e) {
            $c = new UserController();
            $c->error($e->getMessage());
            exit;
        }
    }

    /*
     * create php and sql statements that allows a user to add and subtract from an account
     * allow the transaction table to preserve the number input for withdraw or deposit
     * the methods should be implemented that handle adding or subtracting new data, but also updating the account balance accordingly
     */
}
