<?php

namespace core;

use Exception;

class Request
{
  private $path;
  private $method;

  public function method(): string
  {
    if (!isset(self::$method)) {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $this->method = 'GET';
      } elseif ($method = get($_POST, '_method')) {
        if (in_array($method, ['PUT', 'PATCH', 'DELETE'])) {
          $this->method = $method;
        } else {
          $this->method = 'POST';
        }
      } else {
        $this->method = 'POST';
      }
    }
    return $this->method;
  }

  public function path(): string
  {
    if (!isset($this->path)) {
      $this->path = substr(parse_url($this->url(), PHP_URL_PATH), 1);
    }
    return $this->path;
  }

  public function fetch(string $keys = null)
  {
    $data = json_decode(file_get_contents('php://input'), true);
    return get($data, $keys);
  }

  public function comps(int $pos = null)
  {
    $comps = explode('/', $this->path());
    if (is_null($pos)) {
      return $comps;
    }
    return $comps[$pos] ?? false;
  }

  public function url()
  {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
      . '://' . $_SERVER['HTTP_HOST']
      . $_SERVER['REQUEST_URI'];
  }
}
