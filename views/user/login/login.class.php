<?php
/*
* Author: Adam Patrick
* Date: 10/29/18
* Name: login.class.php
* Description: Create the form that lets the user login
*/
class Login extends UserIndexView{
    public function display(){
        //display header
        parent::displayHeader("Login");
        ?>
        <div class="jumbotron">
            <div class="top-row"><h3>Login</h3></div><br>
            
            <div class="middle-row">
                <!--Get user login info and post it to the model-->
                <!-- <form action="<?= BASE_URL ?>/user/verify" method="post">
                    <input type="text" name="username" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <input type="submit" name="submit" placeholder="Login">
                </form> -->

                <form action="<?= BASE_URL ?>/user/verify" method="post">
                    <div class="form-row">
                    
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <!--Display the links-->
            <div class="bottom-row">
                <span style="float: left">Don't have an account? <a href="<?= BASE_URL ?>/user/user_register">Register</a></span>
            </div>
        </div>
        <?php
        
        //display footer
        parent::displayFooter();
    }
}
