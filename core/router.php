<?php

function route(string $path = '', bool $redirect = false, int $sleepSeconds = 1)
{

	$protocol = defined('HTTPS') && HTTPS ? 'https://' : 'http://';
	$url = $protocol . $_SERVER['HTTP_HOST'] . $path;

	if ($redirect) {
		sleep($sleepSeconds);
		header("Location: " . $url);
		die();
	}

	return $url;
}


function asset($url = null)
{
	return route(str_replace('//', '/', '/assets/' . $url));
}


// Parse URI
preg_match('/^\/?(api)?\/?([a-zA-Z0-9\-_]+)?\/?([a-zA-Z0-9]+)?\/?([a-zA-Z0-9\/\-_]+)?\??/', $_SERVER['REQUEST_URI'], $_REQUEST);

$_api = isset($_REQUEST[1]) && $_REQUEST[1] === 'api';
$_controller = isset($_REQUEST[2]) ? $_REQUEST[2] : 'home';
$_method = isset($_REQUEST[3]) ? $_REQUEST[3] : 'index';
$_params = isset($_REQUEST[4]) ? $_REQUEST[4] : false;

if ($_api) {
	require_once "router-api.php";
	die();
}



/**
 * SPA router
 * 
 */
if (SPA) {

	$file = dirname(__FILE__, 2) . "/public/dist/index.html";

	if (!is_file($file)) {
		core\render::view('default/404.php');
		die();
	}

	echo str_replace('/assets/',  route('/dist') . '/assets/',  file_get_contents($file));
	die();
}


/**
 *
 * controllers instantiation
 *
 */
$_file = dirname(__FILE__, 2) . "/src/controllers/" . $_controller . "Controller.php";


if (is_readable($_file)) {

	require $_file;

	$_instance = $_controller . 'Controller';
	$_instance = new $_instance;

	if (method_exists($_instance, $_method)) {

		if ($_params) {
			call_user_func_array([$_instance, $_method], explode('/', $_params));
			die();
		}

		call_user_func([$_instance, $_method]);
		die();
	}
}

/**
 * if controller or method does not exist call the 404 error page
 */
core\render::view('default/404.php');
