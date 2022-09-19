<?php

namespace controllers;

class StaticController
{
  function home(){
    display('pages/guest/home');
  }

  function about_us(){
    display('pages/guest/about');
  }
}
