<?php

namespace core;

use Exception;

class Route{
  
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

  private function execute(){
    if(is_array($this->action)){
      call_user_func([new $this->action[0], $this->action[1]]);
    }else{
      ($this->action)();
    }
  }
  private function matched(){
    if($this->method != Request::method() || $this->path != Request::path() || $this->input != Request::gettedKeys()){
      return false;
    }
    return true;
  }

  private static $routes = [];
  
  public static function get($path, $action, $input = []){
    self::$routes[] = new Route('GET', $path, $input, $action);
  }
  public static function post($path, $action, $input = []){
    self::$routes[] = new Route('POST', $path, $input, $action);
  }

  public static function add($method, $path, $action, $input = []){
    self::$routes[] = new Route($method, $path, $input, $action);
  }

  public static function exec(){
    foreach(self::$routes as $route){
      if($route->matched()){
        return $route->execute();
      }
    }
    throw new Exception('404');
  }

}