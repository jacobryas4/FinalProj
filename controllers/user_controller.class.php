<?php

/*
 * Ryan Byrd
 * 11/20/2011
 * user_controller.class.php
 * allow the user to perform account-related actions on the site
 */
class UserController {
    //attribute
    private $user_model;
    //instantiate the UserModel object
    public function __construct() {
        $this->user_model = new UserModel();
    }
    //display the homepage
    public function index() {
        $view = new Index();
        $view->display();
    }
    //create a user account by calling the add_user method from the UserModel class 
    public function register() {
        //call the addUser method of the UserModel object
        $result = $this->user_model->add_user();
        //display result
        $view = new Register();
        $view->display($result);
    }
    //call the login form view
    public function login() {
        $view = new Login();
        $view->display();
    }
    //verify username and password. Start by invoking the UserModel, then invoke the password de-hashing function to confirm.
    //It then calls the display method defined in a view class and pass true or false.
    public function verify() {
        //call the verify_user method from UserModel class
        $result = $this->user_model->verify_user();
        //display result
        $view = new Verify();
        $view->display($result);
    }
    //logout function
    public function logout() {
        
        //invoke the logout method from the user_model object
        $this->user_model->logout();
        $view = new Logout();
        $view->display();
    }
    //display the password reset form or an error message.
    public function reset() {
//check if the user is logged in
        if (!isset($_COOKIE['user'])) {
            
//call the error method if the user needs to be logged in 
            $this->error("Login to reset your password.");
        } else { //if the user has logged in.
            $user = $_COOKIE['user'];
            $view = new Reset();
            $view->display($user);
        }
    }
    //reset password by calling the reset_password method from UserModel
    public function do_reset() {
        $result = $this->user_model->reset_password();
        $view = new ResetConfirm();
        $view->display($result);
    }
    //display an error message
    public function error($message) {
        $view = new UserError();
        $view->display($message);
    }
}
