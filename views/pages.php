<?php

include_once 'views.php';

use core\View;

function editorHome()
{
  return html(
    'Biên tập viên',
    body: headerEditor()
  );
}
function editorLogin()
{
  return html(
    'Đăng nhập biên tập viên',
    body: div('centerItem', loginForm('/bientap/login')),
  );
}

function home()
{
  return html(
    title: 'Trang chủ',
    css: ['/css/home.css', '/css/myStyle.css'],
    body: 'Xin chao moi nguoi'
  );
}
