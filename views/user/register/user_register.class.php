<?php
/*
 * Author: Adam Patrick
 * Date: 10/29/18
 * Name: user_register.class.php
 * Description: Defines the UserRegister class, which contains the method for displaying the registration form
 */

class UserRegister extends IndexView {

    //create and display the registration form
    public function display() {

        parent::displayHeader("The Time Bank");
        ?>
        <div id="main-header">
            <h4>Create an account</h4>

            <!--Post registration data to model-->
            <form action="<?= BASE_URL ?>/user/UserRegisterVerify" method="post">
                <!--Get user registration data-->
                <label for="username">Username:</label>
                <input type="text" class="form-control col-3" name="username" placeholder="Username">
                <label for="password">Password:</label>
                <input type="password" class="form-control col-3" name="password" placeholder="Password">
                <label for="email">Email:</label>
                <input type="email" class="form-control col-3" name="email" placeholder="Email"><br/>
                <input type="submit" class="btn btn-info" name="submit" placeholder="Register">
            </form>
            <br/>
            <!--Display the links-->
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}
