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
                
        ?>    
        <div class="jumbotron">
            
            <h4>Welcome to The Time Bank!</h4>
             <!-- <a href=" BASE_URL ?>/account/index">See Accounts</a>
             <br>
             <a href=" BASE_URL ?>/user/index">Dashboard</a> -->
            
        </div>

       
        <?php
        //display page footer
        parent::displayFooter();
    }

}

