<?php
define('APPROOT', dirname(dirname(__FILE__)));
define('ARTICLES_DB_FILE', APPROOT . "/database/articles.json");
define('TAGS_DB_FILE', APPROOT . "/database/tags.json");
define('DEFAULT_SITE_IMAGE', APPROOT . "public/media/reklamy/ez money.webp");

if (APPROOT == "D:\\Programming\\the-epic-gamer-website\\app") {
    define('URLROOT', 'http://localhost/');
} else {
    define('URLROOT', 'https://the-epic-gamer.herokuapp.com/');
}

//Sitename
define('SITENAME', 'The Epic Gamer');
