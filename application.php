<?php

use core\Request;
use core\Route;



define('DIR', __DIR__);
define('PRE_URL', 'http://localhost/');
define('SECRET_JWT', 'tuan');



spl_autoload_register(function ($className) {
  include_once(__DIR__ . '\\' . $className . '.php');
});



include_once 'functions/factories.php';
include_once 'functions/general.php';
include_once 'functions/sql.php';
include_once 'functions/view.php';



include_once 'handlers/exceptions.php';
set_exception_handler('handleException');


include_once 'functions/debug.php';
// $a = [
//   'tuan' => 'Thy',
//   'xinChao' => [
//     'Dinh',
//     'em' => 'Phuong',
//   ]
// ];
// echo array_to_string($a, "<br>", "_ ");
// writeLog(array_to_string($a, "\n", "\t"));
// exit;





include_once 'routes/pages.php';
Route::exec();
