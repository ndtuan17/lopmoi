<?php

$view = view('layouts/guest');


$view->title = 'Diễn đàn gia sư';

$view->main = function () {
?>
  <p>Diễn đàn gia sư</p>
<?php
};



$view->render();
