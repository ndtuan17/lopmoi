<?php

namespace core;

use Exception;
use PDO;

class Model
{

  public function __construct($values)
  {
    foreach($values as $key => $value){
      $this->$key = $value;
    }
  }

  public static function getCollection($data){
    $collection = [];
    foreach($data as $item){
      $model = new static($item);
      $collection[] = $model;
    }
    return $collection;
  }
  
}
