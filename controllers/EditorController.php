<?php

namespace controllers;

use core\User;

class EditorController{

  public function viewLogin(){
    if(User::type('editor')){
      redirectTo('bientap');
    }
    show(editorLogin());
  }
  
  public function login(){

  }

  public function home(){
    if(!User::type('editor')){
      redirectTo('bientap/login');
    }
  }
  public function logout(){

  }

}