<?php

namespace core;

class Token
{

  private array $payload;

  public function get($key = null)
  {
    $payload = $this->payload();
    if ($key === null) {
      return $payload;
    }
    $keys = explode('.', $key);
    foreach ($keys as $key) {
      $payload = $payload[$key] ?? false;
    }
    return $payload;
  }
  private function payload()
  {
    if(!isset($this->payload)){
      $this->payload = $this->evalPayload();
    }
    return $this->payload;
  }
  private function evalPayload()
  {
    //extract token parts
    $jwt = $this->getJwt();
    $tokenParts = explode('.', $jwt);
    if (count($tokenParts) != 2) {
      return [];
    }

    //validate token expiration
    $payload = json_decode(base64_decode($tokenParts[0]), true);
    if (empty($payload)) {
      return [];
    }
    $exp = $payload['tke'] ?? false;
    if ($exp && $exp < time()) {
      return [];
    }

    //validate signature
    $providedSignature = $tokenParts[1];
    $validSignature = $this->generateSignature($tokenParts[0], SECRET_JWT);
    if ($providedSignature !== $validSignature) {
      return [];
    }
    return $payload;
  }
  private function getJwt()
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

  public function generate(array $payload): string
  {
    $payload_encoded = $this->array_toBase64Url($payload);
    $signature = $this->generateSignature($payload_encoded);

    $jwt = "$payload_encoded.$signature";
    return $jwt;
  }





  private function generateSignature($encodedPayload)
  {
    $hashed = hash_hmac('SHA256', "$encodedPayload", SECRET_JWT, true);
    return $this->string_toBase64Url($hashed);
  }

  private function array_toBase64Url($array)
  {
    return $this->string_toBase64Url(json_encode($array));
  }
  private function string_toBase64Url($string)
  {
    return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');
  }
}
