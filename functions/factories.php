<?php

use core\Auth;
use core\Factory;
use core\Request;



function pdo(): PDO
{
  if (!isset(Factory::$pdo)) {
    Factory::$pdo = new PDO('mysql:host=localhost;dbname=vngiasu', 'root', '');
  }
  return Factory::$pdo;
}
function request(): Request
{
  if (!isset(Factory::$request)) {
    Factory::$request = new Request;
  }
  return Factory::$request;
}
function auth(): Auth
{
  if (!isset(Factory::$auth)) {
    Factory::$auth = new Auth;
  }
  return Factory::$auth;
}
