<?php

namespace app\controllers;

use Exception;
use Throwable;

class CenterController
{

  function admin_create()
  {
    checkAdmin();

    display('pages/admin/center/create');
  }

  function store()
  {
    checkAdmin();
    $input = get($_POST, 'name, description, fanpage, website');

    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $nameSave = uniqid() . '.' . $extension;
    var_dump($nameSave);
    $targetPath = DIR . '/public/photos/center/avatar/' . $nameSave;

    if (!getimagesize($_FILES['avatar']['tmp_name'])) {
      throw new Exception('Ảnh rỗng');
    }

    pdo()->beginTransaction();
    try{
      execute(
        "INSERT INTO centers(name, description, fanpage, website)
        VALUES(:name, :description, :fanpage, :website);",
        $input
      );
      $id = pdo()->lastInsertId();
      var_dump($id);
      if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath)){
      }
      execute(
        "UPDATE centers SET avatar = :avatar WHERE id = $id",
        ['avatar' => $nameSave]
      );
      pdo()->commit();
    }catch(Throwable $e){
      var_dump($e);
      pdo()->rollBack();
    }
  }

  function admin_get(){
    checkAdmin();

    display('pages/admin/center/all');
  }

  function admin_see(){
    checkAdmin();
    display('pages/admin/center/show');
  }

  public function all()
  {
    display('pages/guest/centers');
  }
}
