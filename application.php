<?php

use core\Request;
use core\Route;
use core\Token;

define('DIR', __DIR__);
define('PRE_URL', 'http://localhost/');
define('SECRET_JWT', 'tuan');



spl_autoload_register(function ($className) {
  include_once(__DIR__ . '\\' . $className . '.php');
});



include_once 'functions/factories.php';
include_once 'functions/utils.php';
include_once 'functions/sql.php';
include_once 'functions/view.php';

include_once 'functions/debug.php';

// include_once 'handlers/exceptions.php';
// set_error_handler('handleException');
// set_exception_handler('handleException');



include_once 'routes.php';
Route::exec();
