<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/dt.css">
  <?php $this->browse('css', function($path){
    ?>
    <link rel="stylesheet" href="<?php write($path) ?>">
    <?php
  }) ?>
  <script src="/js/dt.js"></script>
  <?php $this->browse('js', function($path){
    ?>
    <script src="<?php write($path) ?>"></script>
    <?php
  }) ?>
  <title><?php $this->write('title') ?></title>
</head>
<body>
  <?php $this->show('body') ?>
</body>
</html>