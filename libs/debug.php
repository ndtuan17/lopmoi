<?php

function writeLog($str)
{
  file_put_contents(DIR . '/libs/debug/log.txt', $str . "\n", FILE_APPEND);
}
