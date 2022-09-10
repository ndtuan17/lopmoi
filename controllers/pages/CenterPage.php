<?php

namespace controllers\pages;

use core\Request;
use Exception;
use models\Center;
use repositories\CenterRepo;

class CenterPage{
  
  public function index(){
    /**
     * 
     * CenterRepo::select(column: , $ids = null)
     * ids = null   => getAll: [], [...Center]
     * ids array    => [], [...Center]
     * ids int      => false, Center
     */
    /**
     * 1. Get All
     * 2. Limit
     * 3. Order by
     * 4. Column's Value in range
     * 5. 
     */
  }

  public function show(){
    $id = 0;
    $center = CenterRepo::get($id);
    if(!$center){
      throw new Exception('404');
    }
    show(editorCenterShow($center));
  }

  public function edit(){
    $id = 0;
    $center = CenterRepo::get($id);
    if(!$center){
      throw new Exception('404');
    }
    show(editorCenterEdit($center));
  }

  public function update(){
    $id = 0;
    $center = CenterRepo::get($id);
    if(!$center){
      throw new Exception('404');
    }
    $input = Request::filterPosted('name', 'address');
    $success = CenterRepo::update($id, $input);
    if(!$success){
      throw new Exception('500');
    }
    redirectTo('/centers');
  }

  public function create(){
    $id = 0;
    $center = CenterRepo::get($id);
    if(!$center){
      throw new Exception('404');
    }
    show(editorCenterEdit($center));
  }

  public function store(){
    $input = Request::filterPosted('name', 'email', 'address');
    $centerId = CenterRepo::insert($input);
    if(!$centerId){
      throw new Exception('500');
    }
    redirectTo('/centers');
  }

  public function delete(){
    $ids = Request::postedInput('ids');
    $countAffected = CenterRepo::delete($ids);
    if()
  }
}