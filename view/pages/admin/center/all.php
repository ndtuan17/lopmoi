<?php

$centers = fetchAll("SELECT id, name, fanpage, website FROM centers");



$view = view('layouts/admin');

$view->main = function () use ($centers) {
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

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Table with stripped rows</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Tên</th>
            <th scope="col">fanpage</th>
            <th scope="col">website</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($centers as $center) {
          ?>
            <tr>
              <th scope="row"><a href="/bientap/centers/<?= filted($center['id']) ?>"><?= filted($center['name']) ?></a></th>
              <td><a href="<?= filted($center['fanpage']) ?>">Fanpage</a></td>
              <td><a href="<?= filted($center['website']) ?>">Website</a></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
<?php
};

$view->render();
