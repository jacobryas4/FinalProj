<?php

class Verify extends IndexView {
    /*
     * Author: Adam Patrick 
     * Date: 10/29/18
     * Name: verify_user.class.php
     * Description: Display a message about whether the login succeeded or failed
     */

    public function display($message) {
        //display page header
        parent::displayHeader("Time Bank Home");
        //if the login was successful display the corresponding message and links
        if ($message == true) {
            ?>
            <div id="main-header">
                <p>You have successfully logged in.</p>

                <span style="float: left">Want to log out? <a href="<?= BASE_URL ?>/user/logout">Logout</a></span>
            </div>
            <?php
            //if the login was unsuccessful display the corresponding message and links
        } else {
            ?>
            <div id="main-header">

                <p>Your last attempt to login failed. Please try again.</p>

                <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            </div>

            <?php
            
            parent::displayFooter();
        }
    }

}
