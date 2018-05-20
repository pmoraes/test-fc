<?php

require_once 'src/Router/Dispatcher.php';
require_once 'src/Http/Request.php';
require_once 'src/Http/Response.php';
require_once 'src/Utilities/Utilities.php';

if (!session_id()) {
	@session_start();
}

/**
 * Directory Separator
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * Root path
 */
define('ROOT', dirname(__FILE__));

/**
 * src path
 */
define('SRC', ROOT . DS . 'src');

/**
 * Config path
 */
define('MODEL', SRC . DS . 'Model');

/**
 * Views path
 */
define('VIEWS', SRC . DS . 'Views');

/**
 * Path to the application's directory.
 */
define('CONTROLLERS', SRC . DS . 'Controllers');

$dispatcher = new Dispatcher(
	new Request(),
	new Response()
);
$dispatcher->dispatch();