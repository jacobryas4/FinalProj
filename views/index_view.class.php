<?php
/*
 * Author: Adam Patrick
 * Date: 11/11/18
 * File Name: index_view.class.php
 * Description: Defines the parent view class with header and footer methods
 */

class IndexView {

//create the page header
    public static function displayHeader($page_title) {
        
        ?>
        <!DOCTYPE html>
        <html>
            <head>

                <meta charset="UTF-8">
                <title>Time Bank</title>

                <!--Add Bootstrap 4 Functionality to make the page look way better (most up-to-date version is here)-->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app-style.css' />
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
                                <a class="nav-link" href="<?= BASE_URL ?>/index.php">Home<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>

                    <!--Access login form-->

                    <?php
                    //prompt the user to log in if they are not. 
                    if (isset($_COOKIE["username"])) {
                        ?>
                        <div class="dropdown">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <?php
                                //display the username if logged in
                                echo "Hello, " . $_COOKIE["username"];
                                ?>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= BASE_URL ?>/user/logout">Logout</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <a class="btn btn-info" href="<?= BASE_URL ?>/user/login">Login</a>
                        <?php
                    }
                    ?>
                </button>

            </nav>
            <?php
        }

        //create the page footer
        public static function displayFooter() {
            ?>
        </body>
        </html>
        <?php
    }

}
