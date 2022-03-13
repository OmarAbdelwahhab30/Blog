<?php


define("DS" , DIRECTORY_SEPARATOR) ;

define("APP_PATH", realpath(__DIR__));

define("URLROOT" , "http://blogg/");

define("VIEW_PATH" , realpath(dirname(__FILE__).DS."views"));

define("SITENAME","Blog");


define ('DB_HOST_NAME', 'localhost');
define ('DB_USER_NAME', 'root');
define ('DB_PASSWORD', '');
define ('DB_NAME', "mvc");