<?php

$permissions = fetchAll(
  "SELECT id, name
  from permissions"
);


$view = view('layouts/admin');

$view->main = function () use ($permissions) {
?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">General Form Elements</h5>

      <!-- General Form Elements -->
      <form action="/bientap/admins" method="POST">
        <input type="hidden" name="csrf" value="<?= $csrf ?>">
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Họ tên</label>
          <div class="col-sm-10">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <legend class="col-form-label col-sm-2 pt-0">Cấp quyền</legend>
          <div class="col-sm-10">

            <?php
            foreach ($permissions as $permission) {
              $id = filted($permission['id']);
            ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="<?= $id ?>" name="permissions[]" value="<?= $id ?>">
                <label class="form-check-label" for="<?= $id ?>">
                  <?= filted($permission['name']) ?>
                </label>
              </div>
            <?php
            }
            ?>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Tạo mới</button>
          </div>
        </div>

      </form><!-- End General Form Elements -->

    </div>
  </div>
<?php
};

$view->render();
