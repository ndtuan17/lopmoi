<?php

namespace controllers;


class AdminController
{

  public function viewLogin()
  {
    if (user()->type('admin')) {
      redirectTo('bientap');
    }
    display('pages/admin/login');
  }

  public function login()
  {
    if (user()->type('admin')) {
      redirectTo('bientap');
    }
    $email = request()->fetch('email');
    $password = request()->fetch('password');
    if (!$email || !$password) {
      header('HTTP/1.1 404 Thieu du lieu');
    }
    $admin = fetch('SELECT * FROM admins where email = :email', ['email' => $email]);
    if (empty($admin)) {
      header('HTTP/1.1 404 Incorrect email');
      exit;
    }
    if (!password_verify($password, $admin['password'])) {
      header('HTTP/1.1 404 Incorrect password');
      exit;
    }
    $payload = [
      'expire' => time() + 3600 * 24 * 30,
      'user' => [
        'type' => 'admin',
        'name' => $admin['name'],
        'email' => $admin['email'],
        'id' => $admin['id'],
        'role_acronym' => 'bientapvien',
        'role_name' => 'Biên tập viên',
      ]
    ];

    $token = token()->generate($payload);
    writeLog($token);
    header('Content-Type: text/plain');
    echo $token;
  }

  public function home()
  {
    if (!user()->type('admin')) {
      redirectTo('bientap/login');
    }
    display('pages/admin/home');
  }
}
