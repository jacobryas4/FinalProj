<?php

/*
 * Author: Adam Patrick
 * Date: 11/11/18
 * File Name: index_view.class.php
 * Description: Defines the parent view class with header and footer methods
 */

class IndexView {
    //create the page header
    public static function displayHeader($page_title){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Time Bank</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app-style.css' />
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                
                <script>
                    //create the JavaScript variable for the base url
                    var base_url = "<?= BASE_URL ?>";
                </script>
            </head>
            <body class="bg-secondary">
               
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="<?= BASE_URL ?>/index.php">Time Bank</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="<?= BASE_URL ?>/index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
<!--                        <li class="nav-item">
                          <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href="#">Disabled</a>
                        </li>-->
                      </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                              <a class="nav-link">Login/Register</a>
                            </li>
                        </ul>
                    </div>
                </nav>
        <?php
    }
    //create the page footer
    public static function displayFooter(){
        ?>
                
                    <div class="footer">

                        <div class="footer-center"><p> The Time Bank 2018</p></div>

                    </div>
                <script src="<?= BASE_URL ?>/www/js/autosuggest.js" type="text/javascript"></script>
                
            </body>
        </html>
        <?php
    }
}
