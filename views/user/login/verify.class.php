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
                <?php
                //hide features from users who are not logged in as admin
                if ($_COOKIE['role'] == 2) {
                    ?>
                    <a href="<?= BASE_URL ?>/admin/index" class="btn btn-info" role="button">Dashboard</a>
                    <?php
                } elseif ($_COOKIE['role'] == 1) {
                    ?>  
                    <a href="<?= BASE_URL ?>/user/index" class="btn btn-success" role="button">Dashboard</a>
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

}
