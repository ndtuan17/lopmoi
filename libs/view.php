<?php

use libs\view\View;

function show($views)
{
  if (is_array($views)) {
    foreach ($views as $view) {
      show($view);
    }
  } else {
    $view = $views;
    if ($view instanceof View) {
      $view->render();
    } elseif (is_string($view)) {
      echo $view;
    } else {
      $view();
    }
  }
}

function write($str)
{
  echo htmlspecialchars($str);
}
function filted($str)
{
  return htmlspecialchars($str);
}

function view($path, $childs = []): View
{
  return new View($path, $childs);
}

function display($path, $childs = [])
{
  view($path, $childs)->render();
}
