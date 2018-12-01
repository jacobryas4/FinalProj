<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_index
 *
 * @author jacobbryant
 */
class AdminIndexView extends IndexView {
    
    public static function displayHeader($title){
        parent::displayHeader($title);
        ?>
        <div class="jumbotron text-center"><h3>Administrator Dashboard</h3></div>

        <?php
    }
    
    
    public static function displayFooter(){
        parent::displayFooter();
    }
    
}
