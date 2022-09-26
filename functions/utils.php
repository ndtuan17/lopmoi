<?php

use core\Auth;
use core\Factory;
use core\Request;
use core\View;


function redirectTo(string $path)
{
  header('Location: ' . PRE_URL . $path);
  exit;
}

function regexRoute($str)
{
  $str = str_replace(':any', '[\w-]*?', $str);
  $str = str_replace(':num', '\d*?', $str);
  $str = '#^' . $str . '$#';
  return $str;
}

function get($arr, $keys = null)
{
  if ($keys == null) {
    return $arr;
  }
  if (!strpos($keys, ', ')) {
    return $arr[$keys] ?? false;
  }
  $keys = explode(', ', $keys);
  $result = array_filter($arr, function ($value, $key) use ($keys) {
    return in_array($key, $keys);
  }, ARRAY_FILTER_USE_BOTH);
  return $result;
}

function set($key, $value, &$arr)
{
  $keys = explode('.', $key);
  $code = '$arr';
  foreach ($keys as $key) {
    $code .= "['" . $key . "']";
  }
  $code .= ' = $value;';
  eval($code);
}

function tunset($key, &$array)
{
  $keys = explode('.', $key);
  $code = 'unset($array';
  foreach ($keys as $key) {
    $code .= "['" . $key . "']";
  }
  $code .= ");";
  eval($code);
}

function checkAdmin()
{
  if (!user()->type('admin')) {
    redirectTo('bientap/login');
  }
}

function checkNotAdmin()
{
  if (user()->type('admin')) {
    redirectTo('bientap');
  }
}
