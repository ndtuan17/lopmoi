<?php

namespace controllers;


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
    $email = get($_POST, 'email');
    $password = get($_POST, 'password');
    if (!$email || !$password) {
      token()->set('flashes.error', 'Thieu thong tin');
      redirectTo('bientap/login');
    }
    $admin = fetch('SELECT * FROM admins where email = :email', ['email' => $email]);
    if (empty($admin)) {
      token()->set('flashes.error', 'Email khong ton tai');
    }
    if (!password_verify($password, $admin['password'])) {
      token()->set('flashes.error', 'Mat khau khong dung');
      // redirectTo('bientap/login');
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

    token()->set(null, value: $payload);
    setcookie('token', token()->new(), time()+ 3600 * 24 * 30, '/');
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
    echo $input['csrf'];
    var_dump(token()->get());
    if (empty($input['name'])) {
    }
  }
}
