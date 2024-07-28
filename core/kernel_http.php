<?php

/**
 * 
 * HTTP Kernel
 * 
 */

//CFG file
require_once dirname(__FILE__, 2) . '/config/env.php';

// hide errors and warnings
ini_set('display_startup_errors', 0);
ini_set('display_errors', 0);
error_reporting(0);

// Show errors if debug
if (DEBUG) {
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

if (VENDOR) {

    // Vendor autoloader
    $vendorAutoload = dirname(__FILE__, 2) . '/vendor/autoload.php';

    if (file_exists($vendorAutoload)) {
        require_once $vendorAutoload;
    } else {
        //Main autoloader
        require_once dirname(__FILE__) . '/autoloader.php';
    }
} else {

    //Main autoloader
    require_once dirname(__FILE__) . '/autoloader.php';
}

require_once dirname(__FILE__) . '/router.php';
