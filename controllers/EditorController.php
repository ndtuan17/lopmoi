<?php

namespace controllers;

use core\Request;
use core\Session;
use core\User;
use models\Editor;

class EditorController{

  public function viewLogin(){
    if(User::type('editor')){
      redirectTo('bientap');
    }
    show(editorLogin());
  }

  public function login(){
    $values = Request::filterPosted('email', 'password');
    $editor = Editor::obj()->find('email', $values['email']);
    if(!$editor){
      Session::setFlash('email_error', 'Email không đúng!');
      return redirectTo('bientap/login');
    }
    if(!password_verify($values['password'], $editor['password'])){
      Session::setFlash('password_error', 'Mật khẩu không đúng!');
      return redirectTo('bientap/login');
    }
    User::login('editor', $editor['id']);
    redirectTo('bientap');
  }

  public function home(){
    if(!User::type('editor')){
      redirectTo('bientap/login');
    }
    show(editorHome());
  }
  
  public function logout(){
    User::logout();
    redirectTo('bientap/login');
  }

}