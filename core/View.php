<?php

namespace core;

use Exception;

class View
{

  private string $path;

  public function __construct(string $path, $props = [])
  {
    $this->path = $path;
    foreach ($props as $propName => $value) {
      $this->$propName = $value;
    }
  }

  public function render()
  {
    $rd_pathRegex = '#^[\w/]+$#';
    preg_match($rd_pathRegex, $this->path, $rd_matches);

    $rd_path = $rd_matches[0];
    $rd_fileContents = file_get_contents(DIR . '/view/' . $rd_path . '.php');
    eval('?>' . $rd_fileContents);
  }

  private function show($propName)
  {
    if (!isset($this->$propName)) {
      return;
    }
    show($this->$propName);
  }

  private function write($propName)
  {
    if (!isset($this->$propName)) {
      return;
    }
    echo htmlspecialchars($this->$propName);
  }

  private function get($propName)
  {
    return isset($this->$propName) ? $this->$propName : false;
  }
}
