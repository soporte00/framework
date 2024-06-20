<?php

/**
 * 
 * Console Kernel
 * 
 */


//Global Vars
define('CONSOLE', true);
$_COOKIE = [];


//Global functions
function _red(string $text)
{
    echo "\e[1;31m$text\e[0m\n";
}

function _green(string $text)
{
    echo "\e[1;32m$text\e[0m\n";
}

function _yellow(string $text)
{
    echo "\e[1;33m$text\e[0m\n";
}

function _blue(string $text)
{
    echo "\e[1;34m$text\e[0m\n";
}

//CFG file
require_once dirname(__FILE__, 2) . "/config/env.php";


if (VENDOR) {

    // Vendor autoloader
    $vendorAutoload = dirname(__FILE__, 2) . '/vendor/autoload.php';

    if (file_exists($vendorAutoload)) {
        require_once $vendorAutoload;
    } else {
        _red("Vendor Autoloader not found!!");
    }
} else {

    //Main autoloader
    require_once dirname(__FILE__) . "/autoloader.php";
}


$_class = explode(':', $argv[1]);

$_fileRequest = dirname(__FILE__) . "/_" . $_class[0] . ".php";


if (is_readable($_fileRequest)) {

    $_instance = '\core\_' . $_class[0];
    $_instance = new $_instance(array_slice($argv, 2));
    $_method = isset($_class[1]) ? $_class[1] : 'index';

    call_user_func([$_instance, method_exists($_instance, $_method) ? $_method : 'index']);
    die();
} else {
    _red("Class not found!!");
}
