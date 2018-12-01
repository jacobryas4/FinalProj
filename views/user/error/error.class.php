<?php
/*
 * Ryan Byrd 
 * 12/1/2018
 * error.class.php
 * A page that displays something went wrong
 */

/**
 * Description of error
 *
 * @author ryand
 */
class UserError extends IndexView {

    public function display() {
        parent::displayHeader("The Time Bank");
        ?>
        <div id="main-header">

            <!--display an error on the page without breaking the application -->
            <h4>Sorry, something went wrong with creating your account.</h4>
            <p>Try a different username or email.</p>
        </div>
        <?php
        parent::displayFooter();
    }

}
