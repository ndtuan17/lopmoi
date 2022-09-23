<?php

namespace core;

use Exception;
use models\Center;
use models\Editor;

class User
{
  public function get($key)
  {
    return token()->get('user.'.$key);
  }

  public function type($type = null)
  {
    return ($type === null) ? $this->get('type') : $this->get('type') === $type;
  }

  public function id()
  {
    return $this->get('id');
  }
}
