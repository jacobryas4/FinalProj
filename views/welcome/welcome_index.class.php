<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome_index
 *
 * @author jacobbryant
 */
class WelcomeIndex extends IndexView {

    public function display() {

        //display page header
        parent::displayHeader("Time Bank Home");
        $id = $_COOKIE['id'];
        ?>    
        <div id="main-header">

            <h4>Welcome to The Time Bank!</h4><br/>
            <p>This bank exists as a way for you to keep yourself personally anonymous,
                avoid paying taxes, and travel time freely with a secure place to store your funds.</p>
            <br/>



            <?php
            //hide features from users who are not logged in as admin
            if ($_COOKIE['role'] == 2) {
                ?>
                <p>You are logged in as an administrator.</p>
                <a href="<?= BASE_URL ?>/admin/index" class="btn btn-info" role="button">Dashboard</a>
                <?php
            } elseif ($_COOKIE['role'] == 1) {
                echo "<p>Welcome back! You can visit your dashboard here.</p>";
                echo "<a href=" . BASE_URL . "/user/index/$id class='btn btn-success' role='button'>Dashboard</a>";
                ?>  
            </div>
            <?php
            //if the login was unsuccessful display the corresponding message and links
        } else {
            ?>

                <p>Let's get <a href="<?= BASE_URL ?>/user/login">started</a>.</p>

                <?php
            }
            ?>


        <?php
        //display page footer
        parent::displayFooter();
    }

}
