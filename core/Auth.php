<?php

namespace core;

use Exception;
use models\Center;
use models\Editor;

class Auth
{

  private array $payload;

  public function payload()
  {
    if (!isset($this->payload)) {
      $this->payload = $this->evalPayload();
    }
    return $this->payload;
  }
  private function evalPayload()
  {
    $jwt = getJwt();

    $tokenParts = explode('.', $jwt);

    if (count($tokenParts) != 3) {
      return [];
    }
    $jsonPayload = base64_decode($tokenParts[1]);
    if (!isJson($jsonPayload)) {
      return [];
    }

    $arrPayload = json_decode($jsonPayload, true);
    $exp = isset($arrPayload['exp']) ? $arrPayload['exp'] : false;
    if ($exp && $exp < time()) {
      return [];
    }

    $providedSignature = $tokenParts[2];
    $validSignature = generateSignature($tokenParts[0], $tokenParts[1], SECRET_JWT);
    if ($providedSignature !== $validSignature) {
      return [];
    }
    return $arrPayload;
  }


  public function get($key)
  {
    return isset($this->payload[$key]) ? $this->payload[$key] : false;
  }

  public function type($type =  null)
  {
    $payload = $this->payload();
    if (!isset($payload['type'])) {
      return false;
    }
    if ($type == null) {
      return $payload['type'];
    }
    return $payload['type'] = $type;
  }

  public function id()
  {
    return isset($payload['id']) ? $payload['id'] : false;
  }

  public function generate_jwt($headers, $payload, $secret)
  {
    $headers_encoded = array_toBase64Url($headers);
    $payload_encoded = array_toBase64Url($payload);
    $signature = generateSignature($headers_encoded, $payload_encoded, $secret);

    $jwt = "$headers_encoded.$payload_encoded.$signature";
    return $jwt;
  }
}






function isValidJwt($jwt)
{
  $tokenParts = explode('.', $jwt);

  if (count($tokenParts) != 3) {
    return false;
  }
  $jsonPayload = base64_decode($tokenParts[1]);
  if (!isJson($jsonPayload)) {
    return false;
  }

  $arrPayload = json_decode($jsonPayload, true);
  $exp = isset($arrPayload['jwt_exp']) ? $arrPayload['jwt_exp'] : false;
  if ($exp && $exp < time()) {
    return false;
  }

  $providedSignature = $tokenParts[2];
  $validSignature = generateSignature($tokenParts[0], $tokenParts[1], SECRET_JWT);
  if ($providedSignature !== $validSignature) {
    return false;
  }
  return true;
}

function getJwt()
{
  if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches);
    if (!isset($matches[1])) {
      $jwt = false;
    } else {
      $jwt = $matches[1];
    }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $jwt = isset($_COOKIE['token']) ? $_COOKIE['token'] : false;
  } else {
    $jwt = false;
  }

  return $jwt;
}

function generateSignature($encodedHeader, $encodedPayload, $secret)
{
  $hashed = hash_hmac('SHA256', "$encodedHeader.$encodedPayload", $secret, true);
  return string_toBase64Url($hashed);
}

function array_toBase64Url($array)
{
  return string_toBase64Url(json_encode($array));
}
function string_toBase64Url($string)
{
  return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');
}

function isJson($string)
{
  return is_string($string)
    && is_array(json_decode($string, true))
    && (json_last_error() == JSON_ERROR_NONE);
}
