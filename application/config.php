<?php

/*
 * Ryan Byrd
 * 11/9/2018
 * config.php
 * set application settings
 * 
 */

//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "http://localhost/theFirstBank");

/*************************************************************************************
 *                       settings for the bank                                       *
 ************************************************************************************/

//define default path for media images
define("BANK_IMG", "www/img/bank/");


/*************************************************************************************
 *                       settings for accounts                                       *
 ************************************************************************************/

//define default path for media images
define("BALANCE_IMG", "www/img/balance/");