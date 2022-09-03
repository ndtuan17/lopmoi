<?php

use core\Request;
use core\Route;

session_start();

define('DIR', __DIR__);
define('PRE_URL', 'http://localhost/');

spl_autoload_register(function ($className){
  include_once(__DIR__ . '\\' . $className . '.php');
});



include_once 'functions/general.php';
include_once 'functions/view.php';
include_once 'view/pages.php';
include_once 'view/boxes.php';




Request::validateCsrf();





include_once 'routes.php';
Route::exec();