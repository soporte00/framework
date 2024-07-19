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

function route(string $path = '', bool $redirect = false, int $sleepSeconds = 1)
{
    return $path;
}


/**
 * 
 *  Getting envrionment configuration
 * 
 */

$_cfg = dirname(__FILE__, 2) . "/config/env.php";


if (is_readable($_cfg)) {

    /**
     * Requiring env.php file
     */
    require_once $_cfg;
} else {

    /**
     * 
     *  CFG file doesn't exist !!
     * 
     */
    _red("Fatal Error!! env.php configration file doesn't exist it wil be created");


    //Main autoloader
    require_once dirname(__FILE__) . "/autoloader.php";

    $gettingFiles = glob(dirname(__FILE__, 2) . '/core/templates/config/*');

    $maker = new core\_files();

    foreach ($gettingFiles as $k) {

        preg_match('/.*?([a-zA-Z0-9\-_]+\.[a-zA-Z0-9\-_]+)$/', $k, $match);

        $maker->file(
            './config/' . $match[1],
            true,
            file_get_contents($k)
        );
    }
}




/**
 * Autoloader
 */
if (defined('VENDOR') && VENDOR) {

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



/**
 * 
 *  Getting parameters and starting classes
 *  
 */

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
