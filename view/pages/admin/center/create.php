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
?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form method="POST" action="/bientap/centers" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="inputText" class="col-lg-2 col-form-label">Tên trung tâm</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-lg-2 col-form-label">Mô tả trung tâm</label>
                <div class="col-lg-10">
                  <textarea class="form-control" style="height: 100px" name="description"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-lg-2 col-form-label">Ảnh đại diện</label>
                <div class="col-lg-10">
                  <input class="form-control" type="file" id="formFile" name="avatar">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-lg-2 col-form-label">Link fanpage</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="fanpage">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-lg-2 col-form-label">Link website</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="website">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                  <button type="submit" class="btn btn-primary col-lg-4">Lưu</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>
<?php
};

$view->render();
