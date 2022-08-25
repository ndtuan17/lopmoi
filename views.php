<?php

use core\View;

function html($title, $css = null, $js = null, $body = null){
  return new View('html', compact('title', 'css', 'js', 'body'));
}

