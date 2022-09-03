<?php

use core\View;

function editorHome()
{
  return html(
    'Biên tập viên',
    css: ['/css/layouts/editor.css', '/css/pages/editorHome.css'],
    body: [
      headerEditor(),
      div('main', [
        asideEditor(),
        div('content', loginForm('')),
      ]),
    ]
  );
}
function editorLogin()
{
  return html(
    'Đăng nhập biên tập viên',
    body: div('centerItem', loginForm('/bientap/login')),
  );
}
function editorCenterIndex(){
  return html('Quan ly trung tam',
  body: [
    headerEditor(),
    div('main', [
      asideEditor(),
      div('content', )
    ])
  ])
}

function home()
{
  return html(
    title: 'Trang chủ',
    css: ['/css/home.css', '/css/myStyle.css'],
    body: 'Xin chao moi nguoi'
  );
}
