<?php
define('APPROOT', dirname(dirname(__FILE__)));
const LIB = APPROOT . "/libraries/";
const MODEL = APPROOT . "/models/";
const VIEW = APPROOT . "/views/";

if (APPROOT == "/opt/lampp/htdocs/app") {
    define('URLROOT', "http://" . $_SERVER["SERVER_NAME"] . "/");

    $cleardb_server = 'localhost:3306';
    $cleardb_username = 'root';
    $cleardb_password = '';
    $cleardb_db = 'teg_local';
} else if (APPROOT == "D:\\Programming\\the-epic-gamer-website\\app") {
    define('URLROOT', "http://" . $_SERVER["SERVER_NAME"] . "/");

    $cleardb_server = 'localhost:3306';
    $cleardb_username = 'root';
    $cleardb_password = '';
    $cleardb_db = 'epic_gamer_local';
} else {
    define('URLROOT', 'https://the-epic-gamer.herokuapp.com/');

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"], 1);
}

// Database params
define('DB_HOST', $cleardb_server); //Add your db host
define('DB_USER', $cleardb_username); // Add your DB root
define('DB_PASS', $cleardb_password); //Add your DB pass
define('DB_NAME', $cleardb_db); //Add your DB Name

//Sitename
define('SITENAME', 'The Epic Gamer');
const EXTREMIST_COEFFICIENT = 1.2;
const DEFAULT_SITE_IMAGE = URLROOT . "/public/media/favicon.ico";