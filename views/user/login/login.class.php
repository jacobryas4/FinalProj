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
                <label for="username">Username:</label>
                <input type="text" class="form-control col-3" name="username" placeholder="Username">
                <label for="password">Password:</label>
                <input type="password" class="form-control col-3" name="password" placeholder="Password"><br/>
                <input  type="submit" class ="btn btn-info" name="submit" placeholder="Login" >
            </form><br/>
            <!--Display the links-->
            <span style="float: left">Don't have an account? <a href="<?= BASE_URL ?>/user/user_register">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
