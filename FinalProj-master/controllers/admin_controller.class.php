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
            var_dump($query_terms);
            $message = "An error has occured.";
            $this->error($message);
            return;
        }
        
        // display matched accounts
        $search = new AdminSearch();
        $search->display($query_terms, $accounts);
        
        
    }   
    
    // error handling
    public function error($message) {
        $view = new AdminError();
        $view->display($message);
    }
    
}
