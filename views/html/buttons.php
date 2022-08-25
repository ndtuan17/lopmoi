<view class="simple">
  <link rel="stylesheet" href="/css/buttons.css">
  <?php
  if ($this->get('method') == 'GET') {
  ?>
    <a href="<?php $this->show('path') ?>" class="<?php $this->write('classes') ?>"><?php $this->write('title') ?></a>
  <?php
  } else {
  ?>
    <form class="<?php $this->write('classes') ?>" action="<?php $this->write('path') ?>" method="POST">
      <?php
      showMethodInput($this->get('method'));
      showCsrfInput();
      ?>
      <button type="submit"><?php $this->show('inner') ?></button>
    </form>
  <?php
  }
  ?>
</view>