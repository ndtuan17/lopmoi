<?php

namespace controllers;

class ClassController
{

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

}
