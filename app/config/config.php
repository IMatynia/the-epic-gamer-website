<?php
define('APPROOT', dirname(dirname(__FILE__)));
const LIB = APPROOT . "/libraries/";
const MODEL = APPROOT . "/models/";
const VIEW = APPROOT . "/views/";

if (APPROOT == "/opt/lampp/htdocs/app") {
    // linux lampp
    define('URLROOT', "http://" . $_SERVER["SERVER_NAME"] . "/");

    $db_server = 'localhost:3306';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'teg_local';
} else if (APPROOT == "D:\\Programming\\the-epic-gamer-website\\app") {
    // windows xampp
    define('URLROOT', "http://" . $_SERVER["SERVER_NAME"] . "/");

    $db_server = 'localhost:3306';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'epic_gamer_local';
} else {
    // in the cloud
    die("No cloud config available");
}

// Database params
define('DB_HOST', $db_server); //Add your db host
define('DB_USER', $db_username); // Add your DB root
define('DB_PASS', $db_password); //Add your DB pass
define('DB_NAME', $db_name); //Add your DB Name

//Sitename
define('SITENAME', 'The Epic Gamer');
const EXTREMIST_COEFFICIENT = 1.2;
const DEFAULT_SITE_IMAGE = URLROOT . "/public/media/favicon.ico";