<?php



function writeLog($content)
{
  file_put_contents(DIR . '/log.txt', $content . "\n", FILE_APPEND);
}


function array_to_string($param, $break, $tab)
{
  static $tabs = 0;
  $string = '';
  if (is_array($param)) {
    $string .= "[" . $break;
    $tabs++;

    foreach ($param as $key => $value) {
      $string .= str_repeat($tab, $tabs);
      $string .= $key . " => " . array_to_string($value, $break, $tab);
    }

    $tabs--;
    $string .= str_repeat($tab, $tabs);
    $string .= "],";
  } else {
    $string .= $param . ",";
  }
  $string .= "" . $break;
  return $string;
}
