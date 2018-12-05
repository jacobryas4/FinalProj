<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_controller
 *
 * @author jacobbryant
 */
class AdminController {
    
    private $admin_model;
    
    // default constructor
    public function __construct() {
        $this->admin_model = AdminModel::getAdminModel();
    }
    
    // index action that displays all accounts
    public function index() {
        
        //retrieve all accounts and store them in an array
        $accounts = $this->admin_model->list_account();
        
        if (!$accounts) {
            //display an error
            $message = "There was a problem displaying the accounts.";
            $this->error($message);
            return;
        }
        
        // display all
        $view = new AdminIndex();
        $view->display($accounts);
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
        $accounts = $this->admin_model->search_account($query_terms);
        
        if ($accounts === false) {
            // handle error
            $message = "An error has occured.";
            $this->error($message);
            return;
        }
        
        // display matched accounts
        $search = new AdminSearch();
        $search->display($query_terms, $accounts);
        
    }  
    
    public function suggest($terms) {
        // retrieve terms
        $query_terms = urldecode(trim($terms));
        $accounts = $this->admin_model->search_account($query_terms);
        
        // create array of accounts
        $names = array();
        if ($accounts) {
            foreach($accounts as $account) {
                $names[] = $account->getUsername(); 
            }
        }
        echo json_encode($names);
    }
    
    // error handling
    public function error($message) {
        $view = new AdminError();
        $view->display($message);
    }
    
    // present a form to add an account to the database
    public function add() {
        
        //retrieve all accounts and store them in an array
        $accounts = $this->admin_model->list_account();
        
        if (!$accounts) {
            //display an error
            $message = "There was a problem displaying the accounts.";
            $this->error($message);
            return;
        }
        
        // display all
        $view = new AdminAdd();
        $view->display();
        
        
    }
    
    // actually add the account to the database
    public function addAccount() {
        
        // add the new account to the database
        $addAccount = $this->admin_model->add_account();
        
        // handle updates
        if(!$addAccount) {
            $message = "There was a problem adding the account";
            $this->error($message);
            return;
        }
        
        //retrieve all accounts and store them in an array
        $accounts = $this->admin_model->list_account();
        
        // display all
        $view = new AdminIndex();
        $view->display($accounts);
        
    }
    
    // present form to update account
    public function update($id) {
        
        //retrieve all accounts and store them in an array
        $account = $this->admin_model->view_account($id);
        
        
        if (!$account) {
            //display an error
            $message = "There was a problem displaying the accounts.";
            $this->error($message);
            return;
        }
        
        // display all
        $view = new AdminUpdate();
        $view->display($account);
        
    }
    
    // actually update account info in the database
    public function updateAccount($id) {
        
        // update the account
        $update = $this->admin_model->update_account($id);
        var_dump($update);
        if (!$update) {
            // error handling
            $message = "There was a problem updating account id=" . $id;
            $this->error($message);
            return;
        }
        
        //retrieve all accounts and store them in an array
        $accounts = $this->admin_model->list_account();
        
        // display results
        $view = new AdminIndex();
        $view->display($accounts);
        
    }
    
    
    
}
