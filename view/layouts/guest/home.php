<link rel="stylesheet" href="/css/guest/home.css">
<header>
  <div class="main-header">

  </div>
</header>
<nav>
  <?php
  foreach ($this->get('items') as $item) {
  ?>
    <li><?php write($item) ?></li>
  <?php
  }
  ?>
</nav>
<div class="main-container">
  <?php $this->show('main') ?>
</div>