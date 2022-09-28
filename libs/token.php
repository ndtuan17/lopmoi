<?php

use libs\token\Token;

ob_start();

register_shutdown_function(function () {
  setcookie('token', token()->new(), time() + 3600 * 24 * 30, '/');
});


define('SECRET_LOPMOI', 'tuan');


function token(): Token
{
  if (!isset(Token::$obj)) {
    Token::$obj = new Token;
  }
  return Token::$obj;
}

function checkNotAdmin()
{
  if (token()->get('type') === 'admin') {
    redirectTo('bientap');
  }
}

function checkAdmin()
{
  if (token()->get('type') !== 'admin') {
    redirectTo('bientap/login');
  }
}

function _csrf(): string
{
  $csrf = rand();
  token()->newPayload['csrf'] = $csrf;
  return '<input type="hidden" name="csrf" value="' . $csrf . '">';
}

function setFlash($key, $value)
{
  token()->newPayload['flashes'][$key] = $value;
}

function checkValidCsrf($path)
{
  if (!isset(token()->currentPayload['csrf'])) {
    redirectTo($path);
  }
  if (!isset($_POST['csrf'])) {
    redirectTo($path);
  }
  if ($_POST['csrf'] !== token()->currentPayload['csrf']) {
    redirectTo($path);
  }
}
