<?php
session_start();

//Definir el código de caracteres
header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json');

// Definir el control de acceso
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    die();
}

// Configure the default time zone
date_default_timezone_set('MST');

// Use PHP's directory separator for windows/unix compatibility
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

// Define absolute path to server root
//defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(dirname(__FILE__)).DS);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(__FILE__) . DS);
defined('INCLUDE_PATH') ? NULL : define('INCLUDE_PATH', SITE_ROOT . 'includes' . DS);
defined('LIB_PATH') ? NULL : define('LIB_PATH', INCLUDE_PATH . 'libraries' . DS);
defined('MODEL_PATH') ? NULL : define('MODEL_PATH', SITE_ROOT . 'models' . DS);

$SERVER = json_decode(
    file_get_contents(INCLUDE_PATH . 'server.json')
);

// Define absolute path to Front-end
defined('BASE_URL') ? NULL : define('BASE_URL', $SERVER->url);

// Base de datos
defined('DATABASE_HOST') ? NULL : define('DATABASE_HOST', $SERVER->host);
defined('DATABASE_NAME') ? NULL : define('DATABASE_NAME', $SERVER->database);
defined('DATABASE_USER') ? NULL : define('DATABASE_USER', $SERVER->user);
defined('DATABASE_PASSWORD') ? NULL : define('DATABASE_PASSWORD', $SERVER->password);

require_once(LIB_PATH . 'mysql.class.php');
require_once('auth.php');