<?php

use core\View;


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
    } else {
      echo $view;
    }
  }
}

function write($str)
{
  echo htmlspecialchars($str);
}

function view($path, $childs = []): View
{
  return new View($path, $childs);
}

function showPage($title, $body)
{
  view('htmls/html', [
    'title' => $title,
    'body' => $body
  ])->render();
}

function layout($path, $childs = [])
{
  return view('layouts/' . $path, $childs);
}

function main($path, $childs = [])
{
  return view('mains/' . $path, $childs);
}
