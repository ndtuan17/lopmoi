<?php

use core\View;

function redirectTo(string $path)
{
  header('Location: ' . PRE_URL . $path);
  exit;
}