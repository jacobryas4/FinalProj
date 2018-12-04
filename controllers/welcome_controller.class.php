<?php

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
