<view class="login">
  <link rel="stylesheet" href="/css/forms.css">
  <form class="login" action="<?php

use core\Session;

 $this->write('path') ?>" method="POST">
    <?php
    showMethodInput($this->get('method'));
    showCsrfInput() ?>
    <input type="email" class="login" name="email" placeholder="Your email...">
    <label class="error" for="" <?php if(!Session::flash('email_error')){ echo 'style="display: none;"'; } ?> >Email không đúng! </label>
    <input type="password" class="login" name="password" placeholder="Your password...">
    <label class="error" for="" <?php if(!Session::flash('password_error')){ echo 'style="display: none;"'; } ?> >Mật khẩu không đúng! </label>
    <button type="submit">Đăng nhập</button>
  </form>
</view>