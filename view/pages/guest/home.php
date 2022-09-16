<?php

$view = view('layouts/guest/home');


$view->title = 'Trang chu Lopmoi';

$view->body = function(){
  ?>
  <p>This is content hahaha</p>
  <?php
};



$view->render();