<?php

use libs\router\Route;

function route(): Route
{
  if (!isset(Route::$obj)) {
    Route::$obj = new Route;
  }
  return Route::$obj;
}

function regexRoute($str)
{
  $str = str_replace(':any', '[\w-]*?', $str);
  $str = str_replace(':num', '\d*?', $str);
  $str = '#^' . $str . '$#';
  return $str;
}

include_once 'router/routes.php';
route()->exec();
