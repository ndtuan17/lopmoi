<?php

namespace app\controllers;

class ClassController
{

  public function dashboard(){
    if(!user()->type('admin')){
      redirectTo('bientap/login');
    }
    
    display('pages/admin/class/dashboard');
  }

  public function adminCreate(){
    if(!user()->type('admin')){
      redirectTo('bientap/login');
    }
    display('pages/admin/class/create');
  }

  public function all(){
    $classes = [
      [
        'subject' => 'Toán',
        'grade' => '9',
      ],
      [
        'subject' => 'Văn',
        'grade' => '11',
      ],
      [
        'subject' => 'Sinh học',
        'grade' => '12',
      ],
      [
        'subject' => 'Vật Lý',
        'grade' => '10',
      ],
    ];
    display('pages/guest/classes', compact('classes'));
  }

  public function filter(){
    $subject_ids = [1, 3, 5];
    $ranks = [0, 1];
    $grades = [1, 2, 3, 4];
  }

}
