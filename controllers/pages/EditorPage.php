<?php

namespace controllers\pages;


class EditorPage
{
  public function login()
  {
    if (auth()->type('editor')) {
      redirectTo('bientap');
    }
  }

  public function home()
  {
    if (!auth()->type('editor')) {
      redirectTo('bientap/login');
    }
  }
}
