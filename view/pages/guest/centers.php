<?php

$view = view('layouts/guest');


$view->title = 'Danh sách các trung tâm';

$view->main = function(){
  ?>
  <p>Danh sách các trung tâm</p>
  <?php
};


$view->render();