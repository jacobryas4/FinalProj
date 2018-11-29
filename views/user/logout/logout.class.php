<?php
/*
* Author: Adam Patrick
* Date: 10/29/18
* Name: logout.class.php
* Description: Display the logout message
*/
class Logout {
    public function display(){

        ?>
        <!--Display the message-->
        <div class="middle-row">
            <p>You have been logged out.</p>
        </div>
        <!--Display the links-->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>
        <?php

    }
}