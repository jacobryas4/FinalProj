<?php

/*
 * Author: Adam Patrick
 * Date: 11/11/18
 * File Name: index_view.class.php
 * Description: Defines the parent view class with header and footer methods
 */

class IndexView {
    //create the page header
    public static function displayHeader(){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Time Bank</title>
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
                <script>
                    //create the JavaScript variable for the base url
                    var base_url = "<?= BASE_URL ?>";
                </script>
            </head>
            <body>
                <h1>Time Bank</h1>
        <?php
    }
    //create the page footer
    public static function displayFooter(){
        ?>
            </body>
        </html>
        <?php
    }
}
