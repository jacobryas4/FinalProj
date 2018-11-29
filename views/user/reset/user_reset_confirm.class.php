<?php
/*
* Author: Adam Patrick
* Date: 10/29/18
* Name: reset_confirm.class.php
* Description: display a message about whether the password reset attempt was successful
*/
class UserResetConfirm extends UserIndexView {
    public function display($message){
        //display header
        parent::header();
        ?>
        <div class="top-row">Reset Password</div>
        <?php
        //display a success message if password reset was successful
        if($message == true){
            ?>
            <div class="middle-row">
                <p>You have successfully reset your password.</p>
            </div>
            <div class="bottom-row">
                <span style="float: left">Want to log out?<a href="<?= BASE_URL ?>/user/logout">Logout</a></span>
                <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/user_register">Register</a></span>
            </div>
            <?php
        //display an error message if password reset was unsuccesful
        } else {
            ?>
            <div class="middle-row">
                <p>Your last attempt to reset your password failed. Please try again.</p>
            </div>
            <div class="bottom-row">
                <span style="float: left">Want to log out?<a href="<?= BASE_URL ?>/user/logout">Logout</a></span>
            </div>            
            <?php
        }
        //display footer
        parent::footer();
    }
}