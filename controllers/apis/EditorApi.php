<?php

namespace controllers\apis;

class EditorApi
{
  public function login()
  {
    $input = array_only(['email', 'password'], request()->ajaxPosted());
    $editor = fetch("SELECT * FROM editors where email = :email", ['email' => $input['email']]);
    if (empty($editor)) {
      header('HTTP/1.0 401 Email not exists', true, 401);
      exit;
    }
    if (!password_verify($input['password'], $editor['password'])) {
      header('HTTP/1.0 401 Incorrect Password!', true, 401);
      exit;
    }
    $header = ['alg' => 'HS256', 'typ' => 'JWT'];
    $payload = [
      'type' => 'editor',
      'id' => $editor['id'],
      'email' => $editor['email'],
      'name' => $editor['name']
    ];
    $jwt = auth()->generate_jwt($header, $payload, SECRET_JWT);
    header('Content-Type: text/plain; charset=utf-8');
    echo $jwt;
    exit;
  }
}
