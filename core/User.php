<?php

namespace core;

class User
{

  public static function login($type, int $id)
  {
    $_SESSION['userType'] = $type;
    $_SESSION['userId'] = $id;
  }
  public static function logout()
  {
    unset($_SESSION['userType']);
    unset($_SESSION['userId']);
    unset($_SESSION['user']);
  }

  public static function set($key, $value)
  {
    $_SESSION['user'][$key] = $value;
  }
  public static function get($key)
  {
    return (isset($_SESSION['user'][$key])) ? $_SESSION['user'][$key] : false;
  }

  public static function type($type = null)
  {
    if (!isset($_SESSION['userType'])) {
      return false;
    }
    return ($type == null) ? $_SESSION['userType'] : $_SESSION['userType'] == $type;
  }
  public static function id()
  {
    return (isset($_SESSION['userId'])) ? $_SESSION['userId'] : false;
  }
}
