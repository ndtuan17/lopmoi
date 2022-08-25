<?php

function insertQuery($values, $table){
  $strColumns = strKeys($values);
  $strHolders = strHolders($values);
  return "INSERT INTO $table (" . $strColumns . ") VALUES (" . $strHolders . ")";
}
function updateQuery($table, $values, int $id){
  $strSetValues = strSetValues($values);
  return "UPDATE $table SET $strSetValues WHERE id = $id";
}

function strKeys($values){
  return implode(', ', array_keys($values));
}
function strHolders($values){
  $keys = array_keys($values);
  if(count($values) == 0){
    return '';
  }
  $strHolders = ':' . implode(', :', $keys);
  return $strHolders;
}
function strSetValues($values){
  $firstTime = true;
  $str = '';
  foreach($values as $key => $value){
    if(!$firstTime){
      $str .= ', ';
    }
    $str .= $key . ' = :' . $value;
    $firstTime = false;
  }
  return $str;
}