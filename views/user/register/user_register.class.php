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
                    <input type="text" name="username" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password, 5 characters minimum" minlength="5" required><br>
                    <input type="email" name="email" placeholder="Email" required><br>
                    <input type="submit" name="submit" placeholder="Register"><br>
                </form>
            <!--Display the links-->
                <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            </div>

            <?php
            parent::displayFooter();
        }

    }
    