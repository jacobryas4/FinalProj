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
        <div class="jumbotron">
            <!--Display the message-->
            <h4>You have been logged out.</h4><br>
            <hr>
            <!--Display the links-->
            Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a><br><br>
            Don't have an account? <a href="<?= BASE_URL ?>/user/user_register">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
