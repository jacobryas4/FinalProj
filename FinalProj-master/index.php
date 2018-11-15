<?php
/*
 * Ryan Byrd, Jacob Bryant, Adam Patrick
 * 11/9/2018
 * index.php
 * The homepage
 */
//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();