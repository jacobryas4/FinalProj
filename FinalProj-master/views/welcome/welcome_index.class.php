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
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    
                    <div class="col">
                        <h4>Welcome to The Time Bank!</h4>
                        <a href="<?= BASE_URL ?>/admin/index">Admin Dashboard</a>
                    </div>
                    <div class="col text-center">
                        <img class="homePageJumbotronImage" src="<?= BASE_URL ?>/www/img/undrawSavings.png">
                    </div>
                    
                </div>
                
            </div>
            
            
            
            
        </div>

       
        <?php
        //display page footer
        parent::displayFooter();
    }

}

