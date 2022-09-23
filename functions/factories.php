<?php

use core\Factory;
use core\Request;
use core\Token;
use core\User;

function pdo(): PDO
{
  if (!isset(Factory::$pdo)) {
    Factory::$pdo = new PDO('mysql:host=localhost;dbname=lopmoi', 'root', '');
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

function user(): User
{
  if (!isset(Factory::$user)) {
    Factory::$user = new User;
  }
  return Factory::$user;
}

function token(): Token{
  if(!isset(Factory::$token)){
    Factory::$token = new Token;
  }
  return Factory::$token;
}
