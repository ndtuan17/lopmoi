<?php

define('SECRET', 'tuan');

if (isset($_COOKIE['token'])) {
  $content = extract_from_token($_COOKIE['token']);
} elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  $content = extract_from_token($_SERVER['HTTP_AUTHORIZATION']);
} else {
  showSplash();
}

if (!$content) {
  showSplash();
}
if (!isset($content['sleep_to'])) {
  showSplash();
}
if ($content['sleep_to'] > time()) {
  showSplash();
}

function showSplash()
{
  $token = generateToken(['sleep_to' => time() + 1]);
  setcookie('token', $token);
  include '../view/pages/splash.php';
  exit;
}

function generateSignature($base64Content)
{
  return hash_hmac('SHA256', $base64Content, SECRET, true);
}

function generateToken($content)
{
  $base64Content = base64_encode(json_encode($content));
  return $base64Content . '.' . generateSignature($base64Content);
}

function extract_from_token($token): array|false
{
  $tokenParts = explode('.', $token);
  if (count($tokenParts) != 2) {
    return false;
  }

  $base64Content = $tokenParts[0];
  $signature = $tokenParts[1];
  if (generateSignature($base64Content) !=  $signature) {
    return false;
  }

  $content = json_decode(base64_decode($base64Content), true);

  return is_null($content) ? false : $content;
}
