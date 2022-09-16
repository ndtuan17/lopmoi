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

function array_only($keys, $arr)
{
  $result = array_filter($arr, function ($value, $key) use ($keys) {
    return in_array($key, $keys);
  }, ARRAY_FILTER_USE_BOTH);
  return $result;
}