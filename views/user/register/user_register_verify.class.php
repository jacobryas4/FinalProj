<?php
/*
 * Author: Adam Patrick
 * Date: 10/29/18
 * Name: user_register_verify.class.php
 * Description: display a message about whether account creation was successful
 */

class UserRegisterVerify extends IndexView {

    public function display($message) {
        parent::displayHeader("The Time Bank");
        ?>
        <?php
        //if account creation was successful display the corresponding message and links
        if ($message == true) {
            ?>
            <div id="main-header">
                <p>Your account has been created.</p>
                <span style="float: left">Ready for your amazing banking experience? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
                <?php
                //if account creation was unsuccessful display the corresponding message and links
            } else {
                ?>
                <p>Your last attempt for creating an account failed. Please try again.</p>
                <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            </div>            
            <?php
            
            parent::displayFooter();
        }
    }

}
