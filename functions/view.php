<?php

use core\View;


function show($view){
  include_once '../pages.php';
  if($view instanceof View){
    $view->render();
  }else{
    echo $view;
  }
}

function write($str){
  echo htmlspecialchars($str);
}