<?php
/*
 * Author: Adam Patrick
 * Date: 10/29/18
 * Name: logout.class.php
 * Description: Display the logout message
 */

class Logout extends IndexView {

    public function display() {

        parent::displayHeader("The Time Bank");
        ?>
        <div id="main-header">
            <!--Display the message-->
            <p>You have been logged out.</p>
            <!--Display the links-->
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
