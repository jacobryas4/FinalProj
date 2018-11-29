<?php
/*
* Author: Adam Patrick
* Date: 10/29/18
* Name: login.class.php
* Description: Create the form that lets the user login
*/
class UserLoginView extends UserIndexView{
    public function display(){
        //display header
        parent::header();
        ?>
        <div class="top-row">Login</div>
        
        <div class="middle-row">
            <!--Get user login info and post it to the model-->
            <form action="index.php?action=verify" method="post">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" name="submit" placeholder="Login">
            </form>
        </div>
        <!--Display the links-->
        <div class="bottom-row">
            <span style="float: left">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <?php
        
        //display footer
        parent::footer();
    }
}
