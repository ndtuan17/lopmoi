<?php

$id = request()->comps(2);
$center = fetch(
  "SELECT id, name, description, avatar, fanpage, website
  FROM centers WHERE id = :id",
  ['id' => $id]
);



$view = view('layouts/admin');

$view->main = function () use ($center) {
  var_dump($center);
};


$view->render();
