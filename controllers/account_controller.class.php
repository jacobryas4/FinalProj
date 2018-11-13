<?php

/*
 * Author: Jacob Bryant
 * Date: 11/13/2018
 * 
 */


class AccountController {
    
    private $account_model;
    
    // default constructor
    public function __construct() {
        // create an instance of the AccountModel class
        $this->account_model = AccountModel::getAccountModel();
    }
    
    // index action that displays all accounts
    public function index() {
        //retrieve all accounts and store them in an array
        $accounts = $this->movie_model->list_account();

        if (!$accounts) {
            //display an error
            $message = "There was a problem displaying the accounts.";
            $this->error($message);
            return;
        }

        // display all movies
        $view = new AccountIndex();
        $view->display($accounts);
    }
    
    // show details of an account
    public function detail($id) {
        
    }
    
    // handle an error
    public function error($message) {
        
    }
    
    // search movies
    public function search() {
        
        // retrieve query terms from search form 
        $query_terms = trim($_GET['query-terms']);
        
        // if search term is empty, list all accounts
        if ($query_terms == "") {
            $this->index();
        }
        
        // search the database for matching accounts
        $accounts = $this->account_model->search_account($query_terms);
        
        if ($accounts === false) {
            
            // handle error
            $message = "An error has occured.";
            $this->error($message);
            return;
            
        }
        
        // display matched accounts
        $search = new AccountSearch();
        $search->display($query_terms, $accounts);
           
    }
    
    // autosuggestion
    public function suggest($terms) {
        
    }
}
