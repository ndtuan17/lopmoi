<?php

use core\View;

function html($title, $css = null, $js = null, $body = null){
  return new View('html', compact('title', 'css', 'js', 'body'));
}

function loginForm($path, $method = 'POST'){
  return new View('forms.login', compact('path', 'method'));
}

function div($classes = '', $inner = ''){
  return new View('divs.simple', compact('inner', 'classes'));
}

function button($method, $path, $classes = '', $inner){
  return new View('buttons.simple', compact('method', 'path', 'classes', 'inner'));
}

function headerEditor(){
  return new View('headers.editor');
}

function asideEditor(){
  return new View('asides.editor');
}