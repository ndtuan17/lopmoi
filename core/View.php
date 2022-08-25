<?php

namespace core;

use Exception;

class View{

  private string $path;
  private $childs;

  public function __construct(string $path, $childs = [])
  {
    $this->path = $path;
    $this->childs = $childs;
  }

  public function render(){
    $rd_pathRegex = '#^([\w/]+)(\.(\w+))?$#';
    preg_match($rd_pathRegex, $this->path, $rd_matches);

    $rd_path = $rd_matches[1];
    $rd_fileContents = file_get_contents(DIR . '/htmls/' . $rd_path . '.php');

    if(!isset($rd_matches[3])){
      $rd_code = $rd_fileContents;
    }else{
      $rd_class = $rd_matches[3];
      $rd_viewRegex = '#<view class="' . $rd_class . '">(.*?)</view>#';
      preg_match($rd_viewRegex, $rd_fileContents, $rd_matches2);
      $rd_code = $rd_matches2[1];
    }
    eval('?>' . $rd_code);
  }

  private function show($childName){
    if(!isset($this->childs[$childName])){
      return;
    }
    $child = $this->childs[$childName];
    if($child instanceof View){
      return $child->render();
    }
    echo $child;
  }

  private function write($childName){
    if(!isset($this->childs[$childName])){
      return;
    }
    echo htmlspecialchars($this->childs[$childName]);
  }

  private function browse($childName, $action){
    if(!isset($this->childs[$childName])){
      return;
    }
    $child = $this->childs[$childName];
    if(!is_array($child)){
      $action($child);
    }else{
      foreach($child as $value){
        $action($value);
      }
    }
  }
}