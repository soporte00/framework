<?php

/**
 * Allow Cors
 */
require_once dirname(__FILE__). '/cors.php';

/**
 *
 * controllers instantiation
 *
 */
if (!$_controller) {
   core\render::json(404)->message('Bad EndPoint')->out();
}

$_file = dirname(__FILE__, 2) . "/src/api_controllers/" . $_controller . "Controller.php";

/**
 * checking file exists
 */
if (is_readable($_file)) {

   /**
    * call instance
    */
   require $_file;

   $_instance = $_controller . 'Controller';
   $_method = $_SERVER['REQUEST_METHOD'] . '_' . $_method;
   $_instance = new $_instance;

   if (method_exists($_instance, $_method)) {
      call_user_func_array([$_instance, $_method], explode('/', $_params));
      die();
   }
}

core\render::json(404)->message('Bad EndPoint')->out();
