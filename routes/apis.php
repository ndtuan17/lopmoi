<?php

use controllers\apis\EditorApi;
use core\Route;

Route::postAjax('login', [], [EditorApi::class, 'login']);