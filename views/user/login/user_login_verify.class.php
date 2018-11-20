<?php
/*
* Author: Adam Patrick
* Date: 10/29/18
* Name: verify_user.class.php
* Description: Display a message about whether the login succeeded or failed
*/
class UserLoginVerifyView extends UserIndexView {
    public function display($message){
        //display header
        parent::header();
        ?>
        <div class="top-row">Login</div>
        <?php
        //if the login was successful display the corresponding message and links
        if($message == true){
            ?>
        
            <div class="middle-row">
                <p>You have successfully logged in.</p>
            </div>
        
            <div class="bottom-row">
                <span style="float: left">Want to log out?<a href="index.php?action=logout">Logout</a></span>
                <span style="float: right">Reset Password?<a href="index.php?action=reset">Reset</a></span>
            </div>
        
            <?php      
        //if the login was unsuccessful display the corresponding message and links
        } else {
            ?>
            
            <div class="middle-row">
                <p>Your last attempt to login failed. Please try again.</p>
            </div>
        
            <div class="bottom-row">
                <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
                <span style="float: right">Reset Password?<a href="index.php?action=reset">Reset</a></span>
            </div>
        
            <?php
        }
        //display footer
        parent::footer();
    }
}