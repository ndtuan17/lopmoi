<?php

namespace core;

class Token
{

  public array $currentPayload;
  public array $newPayload;

  public function __construct()
  {
    $this->currentPayload = $this->evalPayload();
    $this->newPayload = $this->currentPayload;
    unset($this->newPayload['flashes']);
  }

  public function get($key = null)
  {
    $payload = $this->currentPayload;
    if ($key === null) {
      return $payload;
    }
    $keys = explode('.', $key);
    foreach ($keys as $key) {
      $payload = $payload[$key] ?? false;
    }
    return $payload;
  }
  private function evalPayload()
  {
    //extract token parts
    $jwt = $_COOKIE['token'] ?? false;
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

  public function set($key = null, $value)
  {
    if ($key === null) {
      $this->newPayload = $value;
    } else {
      set($key, $value, $this->newPayload);
    }
  }

  public function unset($key)
  {
    tunset($key, $this->newPayload);
  }

  public function new()
  {
    $payload_encoded = $this->array_toBase64Url($this->newPayload);
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
