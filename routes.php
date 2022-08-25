<?php

use controllers\EditorController;
use core\Route;

Route::get('', function(){
  show(home());
});

Route::get('bientap', [EditorController::class, 'home']);
Route::get('bientap/login', [EditorController::class, 'viewLogin']);