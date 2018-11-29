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
        $this->user_model = UserModel::getUserModel();
    }

    //display the homepage
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

//    public function user_register_verify() {
//
//        //call the verify_user method from UserModel class
//        $result = $this->user_model->verify_user();
//
//        //display result
//        $view = new UserRegisterVerify();
//        $view->display($result);
//    }
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

    //verify username and password. Start by invoking the UserModel, then invoke the password de-hashing function to confirm.
    //It then calls the display method defined in a view class and pass true or false.
//    public function verify() {
//
//        //call the verify_user method from UserModel class
//        $result = $this->user_model->verify_user();
//
//        //display result
//        $view = new Verify();
//        $view->display($result);
//    }
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
        if (!isset($_COOKIE['username'])) {

                //handle errors
                $message = "You must be logged in to reset your password.";
                $this->error($message);
                return;
            

//call the error method if the user needs to be logged in 
//            $this->error("Login to reset your password.");
        } else { //if the user has logged in.
            $user = $_COOKIE['username'];
            $view = new UserReset();
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
//    public function error($message) {
//        $view = new UserError();
//        $view->display($message);
//    }
}
