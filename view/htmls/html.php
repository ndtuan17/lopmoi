<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/tn.css">
  <script src="/js/tn.js"></script>
  <link rel="stylesheet" href="/css/<?php $this->write('css') ?>">
  <script src="/js/<?php $this->write('js') ?>"></script>
  <title><?php $this->write('title') ?></title>
</head>

<body>
  <?php $this->show('body') ?>
</body>

</html>