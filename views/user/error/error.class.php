<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_error
 *
 * @author jacobbryant
 */
class UserError extends UserIndexView {
    
    public function display($message) {
        
        // display Header
        parent::displayHeader("Error");
        ?>
        <div id="main-header"></div>
        <div><?= urldecode($message) ?></div>
        <br><br><br>
        <a href="<?= BASE_URL ?>/user/login">Back to login</a>
        <?php
        
        parent::displayFooter();
    }
    
}
