<?php

$view = view('layouts/guest');
$view->title = 'Lopmoi | Về chúng tôi';
$view->main = function(){
  ?>
  <p>Lopmoi.com la trung tam gia su Bố Láo nhất cái Hà Nội này</p>
  <?php
};

$view->render();