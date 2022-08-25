<?php

use core\Session;
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

function showCsrfInput(){
  $csrfToken = rand();
  Session::setFlash('csrfToken', $csrfToken);
  echo '<input type="hidden" name="_csrf" value="'.$csrfToken.'">';
}

function showMethodInput($method){
  if($method == 'POST'){
    return;
  }
  echo '<input type="hidden" name="_method" value="'.$method.'">';
}