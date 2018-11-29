<?php
/*
 * Author: Adam Patrick
 * Date: 10/29/18
 * Name: reset.class.php
 * Description: create the form that lets the user reset their password
 */

class UserReset extends UserIndexView {

    public function display($user) {
 
        ?>
        <div class="top-row">Reset Password</div>
        <?php
        //check if the user is logged in
        if (isset($_COOKIE["user"])) {
            ?>
            <!--If the user is logged in, let them reset their password and post it-->
            <div class="middle-row">
                <p>Please enter a new password. Username is not changeable.</p>
                <form action="<?= BASE_URL ?>/user/do_reset" method="post">
                    <input type="text" name="username" value="<?php echo $_COOKIE["user"] ?>" readonly><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <input type="submit" placeholder="Reset Password">
                </form>    
            </div>

            <?php
         //if the user isnt logged in give them an error and corresponding links
        } else {
            ?>

            <div class="middle-row">
                <p>You are not currently logged in, you need to be logged in to reset your password.</p>
            </div>

            <div class="bottom-row">
                <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/index">Login</a></span>
                <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
            </div>

            <?php
            //display footer
//            parent::footer();
        }
    }

}
