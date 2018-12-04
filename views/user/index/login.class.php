<?php

/*
 * Ryan Byrd
 * 11/28/2018
 * login.class.php
 * Ask the user to log in
 */

class Login {
    public function display(){

        ?>
        <div class="top-row">Login</div>
        
        <div class="middle-row">
            <!--Get user login info and post it to the model-->
            <form action="<?= BASE_URL ?>/user/verify" method="post">
                <input type="text" name="username" placeholder="Username"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="submit" name="submit" placeholder="Login">
            </form>
        </div>
        <!--Display the links-->
        <div class="bottom-row">
            <span style="float: left">Don't have an account? <a href="<?= BASE_URL ?>/user/user_register">Register</a></span>
        </div>
        <?php

    }
}
