<?php

namespace core;

use Exception;

class Route
{
  private static $routes = [];


  public static function get($path, $action)
  {
    self::add('GET', $path, $action);
  }
  public static function post($path, $action)
  {
    self::add('POST', $path, $action);
  }
  public static function put($path, $action)
  {
    self::add('PUT', $path, $action);
  }
  public static function delete($path, $action)
  {
    self::add('DELETE', $path, $action);
  }
  private static function add($method, $path, $action)
  {
    self::$routes[] = [
      'method' => $method,
      'path' => $path,
      'action' => $action
    ];
  }

  public static function exec()
  {
    foreach (self::$routes as $route) {
      if (self::match($route)) {
        return self::execute($route);
      }
    }
    throw new Exception('404');
  }

  private static function match($route)
  {
    if ($route['method'] !== request()->method()) {
      return false;
    }
    $regex = regexRoute($route['path']);
    preg_match($regex, request()->path(), $matches);
    if (!$matches) {
      return false;
    }
    return true;
  }

  private static function execute($route)
  {
    if (is_array($route['action'])) {
      call_user_func([new $route['action'][0], $route['action'][1]]);
    } else {
      $route['action']();
    }
  }
}
