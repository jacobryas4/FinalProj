<?php

/*
 * Ryan Byrd
 * 11/20/2018
 * user_controller.class.php
 * allow the user to perform account-related actions on the site
 */

class UserController {

    //attribute
    private $user_model;

    //instantiate the UserModel object
    public function __construct() {
        $this->user_model = UserModel::getUserModel();
    }

    //display the login page
    public function login() {

        //display index
        $view = new Login();
        $view->display();
    }

    public function verify() {
        //call the verifyUser method of the UserModel object
        $result = $this->user_model->verify_user();

        //display result
        $view = new Verify();
        $view->display($result);
    }
    
        //display the login page
    public function index() {

        //retrieve all accounts and store them in an array
        $id->admin_model->list_account();
        $transactions = $this->user_model->list_transactions();
        
        if (!$transactions) {
            //display an error
            $message = "There was a problem with the display.";
            $this->error($message);
            return;
        }
        
        // display all
        $view = new Index();
        $view->display($id, $transactions);
    }

    //display the homepage
    public function account_index_view() {
        $view = new AccountIndexView();
        $view->display();
    }

    //create a user account
    public function user_register() {

        //call the user_register.class.php view
        $view = new UserRegister();
        $view->display();
    }

//create a user account by calling the add_user method from the UserModel class 
    public function UserRegisterVerify() {

        //call the addUser method of the UserModel object
        $result = $this->user_model->add_user();
        if (!$result) {
            //handle errors
            $message = "There was a problem creating your account.";
            $this->error($message);
            return;
        }

        //display the results if account creation was successful.
        $success = "Welcome to The Time Bank. We welcome your money.";

        $view = new UserRegisterVerify();
        $view->display($result, $success);
    }

    //logout function
    public function logout() {

        //invoke the logout method from the user_model object
        $this->user_model->logout();
        $view = new Logout();
        $view->display();
    }

    //display an error message
    public function error($message) {
        $view = new UserError();
        $view->display($message);
    }

}
