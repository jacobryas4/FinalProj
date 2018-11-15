<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome_controller
 *
 * @author jacobbryant
 */
class WelcomeController {
   public function index() {
       $view = new WelcomeIndex();
       $view->display();
   }
}
