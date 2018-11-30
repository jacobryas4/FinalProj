<?php

/**
 * Description of welcome_controller
 *
 * @author jacobbryant
 */
class WelcomeController extends UserController {
    
    public function index() {
        $view = new WelcomeIndex();
        $view->display();
    }

}
