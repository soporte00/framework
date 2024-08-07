<?php

/**
 * Define if App is in Debug Mode
 */
define('DEBUG', true);

/**
 * SPA 
 * Is a Single Page Application
 */
define('SPA', false);

/**
 * Use composer and vendor folder 
 */
define('VENDOR', false);

/**
 * Use https in routes
 */
define('HTTPS', false);

/**
 * Set the default time zone
 */
date_default_timezone_set("America/Argentina/Tucuman");

/**
 * HTML head configurations
 */
define("HEADCFG",[
    "lang"=>"es",
    "sitename"=>"My Site Name",
    "title"=>"My Site",
    "type"=>'website',
    "description"=>"Micro framework",
    "keywords"=>"framework micro microframework",
    "supportEmail"=>"support@my_site.com"
]);