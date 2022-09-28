<?php

/**
 * Khởi tạo các constance cho dự án
 * Tạo autoload
 * Cung cấp các hàm thao tác số, string, array cơ bản
 */

define('DIR', dirname(__DIR__));
define('PRE_URL', 'http://localhost/');


spl_autoload_register(function ($className) {
  include_once(DIR . '\\' . $className . '.php');
});


function t_extract(array $array, string $keys)
{
  $keys = explode(', ', $keys);
  if (count($keys) === 1) {
    return $array[$keys[0]] ?? false;
  }
  $result = array_filter($array, function ($key) use ($keys) {
    return in_array($key, $keys);
  }, ARRAY_FILTER_USE_KEY);
  return $result;
}
