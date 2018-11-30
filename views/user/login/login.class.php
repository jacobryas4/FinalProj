<?php
/*
 * Ryan Byrd
 * 11/28/2018
 * login.class.php
 * Ask the user to log in
 */

class Login extends IndexView {

    public function display() {
        parent::displayHeader("The Time Bank");
        ?>
        <div id="main-header"><h4>Login</h4>
            <!--Get user login info and post it to the model-->
            <form action="<?= BASE_URL ?>/user/verify" method="post">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" name="submit" placeholder="Login">
            </form>
            <!--Display the links-->
            <span style="float: left">Don't have an account? <a href="<?= BASE_URL ?>/user/user_register">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
