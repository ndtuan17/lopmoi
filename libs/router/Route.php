<?php

namespace libs\router;

use Exception;

class Route
{
  public static Route $obj;

  private $routes = [];


  public function get($path, $action)
  {
    $this->add('GET', $path, $action);
  }
  public function pst($path, $action)
  {
    $this->add('POST', $path, $action);
  }
  public function put($path, $action)
  {
    $this->add('PUT', $path, $action);
  }
  public function del($path, $action)
  {
    $this->add('DELETE', $path, $action);
  }
  private function add($method, $path, $action)
  {
    $this->routes[] = [
      'method' => $method,
      'path' => $path,
      'action' => $action
    ];
  }

  public function exec()
  {
    foreach ($this->routes as $route) {
      if ($this->match($route)) {
        return $this->execute($route);
      }
    }
    throw new Exception('404');
  }

  private function match($route)
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

  private function execute($route)
  {
    if (is_array($route['action'])) {
      call_user_func([new $route['action'][0], $route['action'][1]]);
    } else {
      $route['action']();
    }
  }
}
