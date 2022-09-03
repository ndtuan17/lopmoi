<?php

namespace repositories;

use core\Repo;
use models\Center;

class CenterRepo extends Repo{

  protected string $table = 'centers';
  protected $model = Center::class;

  
}