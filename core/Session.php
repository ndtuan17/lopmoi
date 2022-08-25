<?php

namespace core;

class Session{


  public static function set(string $key, $value){
    $_SESSION[$key] = $value;
  }
  public static function get(string $key){
    if(!isset($_SESSION[$key])){
      return false;
    }
    return $_SESSION[$key];
  }


  public static function setFlash(string $key, string $value){
    $_SESSION['flash'][$key] = $value;
  }
  public static function flash(string $key){
    if(!isset($_SESSION['flash'][$key])){
      return false;
    }
    $result = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return $result;
  }
}