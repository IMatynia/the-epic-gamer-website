<?php
define('APPROOT', dirname(dirname(__FILE__)));
define('ARTICLES_DB_FILE', APPROOT . "/database/articles.json");
define('TAGS_DB_FILE', APPROOT . "/database/tags.json");
define('DEFAULT_SITE_IMAGE', APPROOT . "public/media/reklamy/ez money.webp");

if (APPROOT == "D:\\Programming\\the-epic-gamer-website\\app") {
    define('URLROOT', 'http://localhost/');

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
