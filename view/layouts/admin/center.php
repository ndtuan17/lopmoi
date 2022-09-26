<?php

$view = view('layouts/admin');

$view->headerMain = function () {
?>
  <div class="pagetitle">
    <h1>Quản lý trung tâm</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/bientap/centers">Danh sách</a></li>
        <li class="breadcrumb-item"><a href="/bientap/center/create">Thêm mới</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<?php
};
$view->main = function () {
};
