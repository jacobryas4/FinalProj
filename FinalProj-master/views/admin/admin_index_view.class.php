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
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form class="form-control my-2" action="<?= BASE_URL ?>/admin/search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="query-terms" aria-label="Search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="col-4"></div>

        </div>
        <?php
    }
    
    
    public static function displayFooter(){
        parent::displayFooter();
    }
    
}
