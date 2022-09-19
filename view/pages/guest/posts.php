<?php

$view = view('layouts/guest');


$view->title = 'Blog | Lớp mới';

$view->main = function () {
?>
  <link rel="stylesheet" href="/css/guest/posts.css">
  <p>This is posts page</p>
<?php
};


$view->render();
