<?php

namespace core;

class Session{

  public static function refresh(){
    session_start();
    if(!isset($_SESSION['keepFlash'])){
      return;
    }
    foreach($_SESSION['keepFlash'] as $key => $value){
      if($value == false){
        unset($_SESSION['flash'][$key]);
        unset($_SESSION['keepFlash'][$key]);
      }else{
        $_SESSION['keepFlash'][$key] = false;
      }
    }
  }

  public static function get(string $key){
    if(!isset($_SESSION[$key])){
      return false;
    }
    return $_SESSION[$key];
  }

  public static function flash(string $key){
    if(!isset($_SESSION['flash'][$key])){
      return false;
    }
    return $_SESSION['flash'][$key];
  }

  public static function setFlash(string $key, string $value){
    $_SESSION['flash'][$key] = $value;
    $_SESSION['keepFlash'][$key] = true;
  }

  public static function set(string $key, $value){
    $_SESSION[$key] = $value;
  }

}