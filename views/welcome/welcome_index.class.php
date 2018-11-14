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
        parent::displayHeader("Time Bank Home")
        ?>    
        <div id="main-header">Welcome to The Time Bank!</div>

        <a href="<?= BASE_URL ?>/index.php/account/index">See Accounts</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

}

