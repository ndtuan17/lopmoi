<?php

use controllers\AdminController;
use controllers\StaticController;
use core\Route;


Route::get('bientap', [AdminController::class, 'home']);