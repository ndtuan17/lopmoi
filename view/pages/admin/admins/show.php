<?php

$admins = fetchAll(
  "SELECT id, email, name FROM admins"
);


$view = view('layouts/admin');

$view->main = function () use($admins) {
?>
  <div class="pagetitle">
    <h1>Quản lý Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/bientap/admins">Danh sách</a></li>
        <li class="breadcrumb-item"><a href="/bientap/admins/create">Thêm mới</a></li>
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
            <th scope="col">Họ tên</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($admins as $admin) {
          ?>
            <tr>
              <th scope="row"><a href="/bientap/admins/<?= filted($admin['id']) ?>"><?= filted($admin['name']) ?></a></th>
              <td><?=filted($admin['email'])?></td>
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