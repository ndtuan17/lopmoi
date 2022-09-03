<?php

use controllers\CenterController;
use controllers\EditorController;
use core\Route;

Route::get('', function(){
  show(home());
});

Route::get('bientap', [EditorController::class, 'home']);
Route::get('bientap/login', [EditorController::class, 'viewLogin']);
Route::post('bientap/login', [EditorController::class, 'login']);
Route::post('bientap/logout', [EditorController::class, 'logout']);

Route::get('centers', [CenterController::class, 'index']);