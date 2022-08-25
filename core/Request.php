<?php

namespace core;

use Exception;

class Request
{

  private static $path;
  private static $method;

  public static function validateCsrf()
  {
    if (self::method() == 'GET') {
      return true;
    }
    $csrfFlash = Session::flash('csrfToken');
    if (
      !$csrfFlash ||
      !self::postedInput('_csrf') ||
      $csrfFlash != Request::postedInput('_csrf')
    ) {
      throw new Exception('csrf');
    }
    return true;
  }

  public static function method(): string
  {
    if (!isset(self::$method)) {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        self::$method = 'GET';
      } else {
        if (isset($_POST['_method'])) {
          if (!in_array($_POST['_method'], ['PUT', 'PATCH', 'DELETE'])) {
            self::$method = 'POST';
          } else {
            self::$method = $_POST['_method'];
          }
        } else {
          self::$method = 'POST';
        }
      }
    }
    return self::$method;
  }

  public static function path(): string
  {
    if (!isset(self::$path)) {
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
      self::$path = $path;
    }
    return self::$path;
  }

  public static function gettedInput(string $key = null)
  {
    if ($key == null) {
      return $_GET;
    }
    return isset($_GET[$key]) ? $_GET[$key] : false;
  }
  public static function postedInput(string $key = null)
  {
    if ($key == null) {
      return $_POST;
    }
    return isset($_POST[$key]) ? $_POST[$key] : false;
  }
  public static function gettedKeys()
  {
    return array_keys(self::gettedInput());
  }

  public static function filterPosted(...$keys){
    $postedInput = self::postedInput();
    return array_only($keys, $postedInput);
  }
}
