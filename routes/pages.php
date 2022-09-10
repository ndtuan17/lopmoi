<?php

use controllers\apis\EditorApi;
use controllers\CenterController;
use controllers\pages\EditorPage;
use core\Route;

Route::get('', function () {
  $items = ['tuan', 'dinh'];
  showPage(
    'tieu de 1',
    layout('guest/home', [
      'items' => $items,
      'main' => main('guest/home', [
        'title' => 'Danh sach lop',
        'content' => 'Lop1 lop2 lop3'
      ])
    ])
  );
});

Route::get('2', function () {
});


Route::get('bientap', [EditorPage::class, 'home']);
Route::get('bientap/login', [EditorPage::class, 'login']);
Route::api('POST', 'bientap/login', [EditorApi::class, 'login']);


Route::get('centers', [EditorPage::class, 'index']);
