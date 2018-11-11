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
