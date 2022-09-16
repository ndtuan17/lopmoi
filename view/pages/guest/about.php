<?php

$layout = view('layouts/guest/home');
$layout->title = 'Lopmoi | Về chúng tôi';
$layout->body = function(){
  ?>
  <p>Lopmoi.com la trung tam gia su Bố Láo nhất cái Hà Nội này</p>
  <?php
};
return $layout;