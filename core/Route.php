<?php

namespace core;

use Exception;

class Route
{

  private $method;
  private $path;
  private $input = [];
  private $action;

  public function __construct($method, $path, $input, $action)
  {
    $this->method = $method;
    $this->path = $path;
    $this->input = $input;
    $this->action = $action;
  }

  private function execute()
  {
    if (is_array($this->action)) {
      call_user_func([new $this->action[0], $this->action[1]]);
    } else {
      ($this->action)();
    }
  }
  private function matched()
  {
    if (
      $this->method != request()->method()
      || $this->path != request()->path()
      || $this->input != request()->gettedKeys()
    ) {
      return false;
    }
    return true;
  }

  private static $routes = [];

  public static function get($path, $action, $input = [])
  {
    self::$routes[] = new Route('GET', $path, $input, $action);
  }
  public static function add($method, $path, $action, $input = [])
  {
    self::$routes[] = new Route($method, $path, $input, $action);
  }
  public static function api($method, $path, $action, $input = [])
  {
    self::$routes[] = new Route($method, 'api/' . $path, $input, $action);
  }

  public static function exec()
  {
    foreach (self::$routes as $route) {
      if ($route->matched()) {
        return $route->execute();
      }
    }
    throw new Exception('404');
  }
}
