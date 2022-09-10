<?php

namespace core;

use Exception;

class Request
{

  private static Request $instance;

  public static function obj(): Request
  {
    if (!isset(self::$instance)) {
      self::$instance = new Request;
    }
    return self::$instance;
  }


  private $path;
  private $method;

  public function isAjax(){
    return str_starts_with($this->path(), 'api');
  }

  public function method(): string
  {
    if (!isset(self::$method)) {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $this->method = 'GET';
      } elseif ($method = $this->posted('_method')) {
        if (in_array($method, ['PUT', 'PATCH', 'DELETE'])) {
          $this->method = $method;
        } else {
          $this->method = 'POST';
        }
      } elseif ($method = $this->ajaxPosted('_method')) {
        if (in_array($method, ['PUT', 'PATCH', 'DELETE'])) {
          $this->method = $method;
        } else {
          $this->method = 'POST';
        }
      } else {
        $this->method = 'POST';
      }
    }
    return $this->method;
  }

  public function path(): string
  {
    if (!isset($this->path)) {
      $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      $path = substr($path, 1);
      $regex1 = '#^(.*?)(\#.*)?$#';
      $regex2 = '#^(.*?)(\?.*)?$#';
      $regex3 = '#^(.*?)/*$#';

      preg_match($regex1, $path, $matches);
      $path = $matches[1];
      preg_match($regex2, $path, $matches);
      $path = $matches[1];
      preg_match($regex3, $path, $matches);
      $path = $matches[1];
      $this->path = $path;
    }
    return $this->path;
  }

  public function getted(string $key = null)
  {
    if ($key == null) {
      return $_GET;
    }
    return isset($_GET[$key]) ? $_GET[$key] : false;
  }
  public function posted(string $key = null)
  {
    if ($key == null) {
      return $_POST;
    }
    return isset($_POST[$key]) ? $_POST[$key] : false;
  }
  public function ajaxPosted(string $key = null)
  {
    $posted = json_decode(file_get_contents('php://input'), true);
    if ($key === null) {
      return $posted;
    }
    return isset($posted[$key]) ? $posted[$key] : false;
  }

  public function gettedKeys()
  {
    return array_keys($this->getted());
  }

  public function filterPosted(...$keys)
  {
    $postedInput = $this->posted();
    return array_only($keys, $postedInput);
  }
}
