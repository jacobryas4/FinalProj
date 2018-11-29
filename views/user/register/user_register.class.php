<?php

/*
* Author: Adam Patrick
* Date: 10/29/18
* Name: user_register.class.php
* Description: Defines the UserRegister class, which contains the method for displaying the registration form
*/

class UserRegister {
    
    //create and display the registration form
    public function display(){

        ?>
        <div class="top-row">Create an account</div>

        <div class="middle-row">
            <!--Post registration data to model-->
            <form action="<?= BASE_URL ?>/user/UserRegisterVerify" method="post">
                <!--Get user registration data-->
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password, 5 characters minimum" minlength="5" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="text" name="first-name" placeholder="First Name" required><br>
                <input type="text" name="last-name" placeholder="Last Name" required><br>
                <input type="submit" name="submit" placeholder="Register"><br>
            </form>
        </div>
        <!--Display the links-->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
        </div>
            
        <?php
        

    }
}
