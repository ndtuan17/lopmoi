<?php

$view = view('layouts/guest');


$view->title = 'Chọn mẫu CV';
$view->main = function(){
  ?>
  <p>Các mẫu CV</p>  
  <?php
};



$view->render();