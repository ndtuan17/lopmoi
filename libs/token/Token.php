<?php

namespace libs\token;

class Token
{
  public static Token $obj;

  public array $currentPayload;
  public array $newPayload;

  public function currentPayload()
  {
    if (!isset($this->currentPayload)) {
      $this->currentPayload = $this->evalCurrentPayload();
    }
    return $this->currentPayload;
  }
  private function evalCurrentPayload()
  {
    if (!isset($_COOKIE['token'])) {
      return [];
    }
    $token = $_COOKIE['token'];
    $tokenParts = explode('.', $token);
    if (count($tokenParts) !== 2) {
      return [];
    }

    $payload = json_decode(base64_decode($tokenParts[0]), true);
    if (empty($payload)) {
      return [];
    }
    $exp = $payload['tke'] ?? false;
    if ($exp && $exp > time()) {
      return [];
    }

    $validSignature = $this->generateSignature($tokenParts[0]);
    if ($tokenParts[1] !== $validSignature) {
      return [];
    }

    return $payload;
  }

  public function newPayload()
  {
    if (!isset($this->newPayload)) {
      $this->newPayload = $this->evalNewPayload();
    }
    return $this->newPayload;
  }
  private function evalNewPayload()
  {
    $newPayload = $this->currentPayload();
    unset($newPayload['flashes']);
    return $newPayload;
  }

  public function new()
  {
    $payload_encoded = $this->array_toBase64Url($this->newPayload());
    $signature = $this->generateSignature($payload_encoded);
    return "$payload_encoded.$signature";
  }

  public function get($key)
  {
    return $this->newPayload[$key] ?? false;
  }


  private function generateSignature($encodedPayload)
  {
    $hashed = hash_hmac('SHA256', "$encodedPayload", SECRET_LOPMOI, true);
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
