<?php

use libs\request\Request;

function request(): Request
{
  if (!isset(Request::$instance)) {
    Request::$instance = new Request;
  }
  return Request::$instance;
}

function redirectTo(string $path)
{
  header('Location: ' . PRE_URL . $path);
  exit;
}
