<?php

namespace models;

use core\Model;

class Center extends Model{

  public function __construct($array)
  {
    foreach($array as $key => $value){
      $this->$key = $value;
    }
  }
}