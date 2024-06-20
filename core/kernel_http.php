<?php

/**
 * 
 * HTTP Kernel
 * 
 */


//Global Vars
define('HTTP', true);

//CFG file
require_once dirname(__FILE__, 2) . '/config/env.php';


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
