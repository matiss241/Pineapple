<?php

/*Website title*/

define('WEBSITE_TITLE', "Magebit");

/*Database variables*/

define('DB_TYPE', 'mysql');
define('DB_NAME', 'pineapple');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_HOST', 'localhost');

/*Protocal type*/

define('PROTOCAL', 'http');

/*Set paths for easier access*/

$path = str_replace("\\", "/", PROTOCAL . "://" . $_SERVER['SERVER_NAME'] . __DIR__ . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));

/*Set to false, so errors are not going to show in the website*/

define('DEBUG', false);

if (DEBUG) {
    ini_set("display_errors", 1);
} else {
    ini_set("display_errors", 0);
}
