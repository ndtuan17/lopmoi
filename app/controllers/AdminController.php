<?php

namespace app\controllers;


class AdminController
{

  public function viewLogin()
  {
    checkNotAdmin();
    display('pages/admin/login');
  }

  public function login()
  {
    checkNotAdmin();
    checkValidCsrf('bientap/login');
    $email = t_extract($_POST, 'email');
    $password = t_extract($_POST, 'password');
    if (empty($email) || empty($password)) {
      setFlash('error', 'Thieu thong tin');
      redirectTo('bientap/login');
    }
    $admin = fetch('SELECT * FROM admins where email = :email', ['email' => $email]);
    if (empty($admin)) {
    }
    if (!password_verify($password, $admin['password'])) {

      redirectTo('bientap/login');
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


    redirectTo('bientap');
  }

  public function home()
  {
    checkAdmin();
    // redirectTo('bientap/classes');
    display('pages/admin/home');
  }

  public function show()
  {
    checkAdmin();
    display('pages/admin/admins/show');
  }

  public function create()
  {
    checkAdmin();
    display('pages/admin/admins/create');
  }

  public function store()
  {
    checkAdmin();
    $input = get($_POST, 'csrf, name, email, password, permissions');
    if (empty($input['name'])) {
    }
  }
}
