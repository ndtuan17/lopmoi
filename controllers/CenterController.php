<?php

namespace controllers;

use core\Request;
use Exception;
use models\Center;
use repositories\CenterRepo;

class CenterController{
  
  public function all(){
    display('pages/guest/centers');
  }
}