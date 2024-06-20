<?php

/**
 * Main atuoloader
 */
spl_autoload_register(function ($class) {

    $path = dirname(__FILE__, 2) . "/" . str_replace('\\', '/', $class) . ".php";

    if (file_exists($path)) {
        require_once $path;
    }
});
