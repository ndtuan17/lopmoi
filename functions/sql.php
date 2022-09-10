<?php

use core\Factory;



function fetchAll(string $query, array $values = null)
{
  $prepare = pdo()->prepare($query);
  $prepare->execute($values);
  $item = $prepare->fetchAll(PDO::FETCH_ASSOC);
  return $item;
}

function fetch(string $query, array $values = null)
{
  $prepare = pdo()->prepare($query);
  $prepare->execute($values);
  $list = $prepare->fetch(PDO::FETCH_ASSOC);
  return $list;
}

function execute(string $statement, array $values = null): PDOStatement|false
{
  $prepare = pdo()->prepare($statement);
  try {
    $prepare->execute($values);
  } catch (Exception $e) {
    return false;
  }
  return $prepare;
}

function getReferences($ids, string $refTable, string $refId)
{
  if (is_array($ids)) {
    $strIds = strArray($ids);
    $query = "SELECT * FROM $refTable WHERE $refId IN $strIds";
  } else {
    $id = $ids;
    $query = "SELECT * from $refTable where $refId = $id";
  }
  $prepare = pdo()->prepare($query);
  $prepare->execute();
  $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
  $data = array_column($data, 'id');
  return $data;
}

function getRelatives($ids, $table1, $table2, $relTable, $refId1, $refId2)
{
  if (is_array($ids)) {
    $strIds = '(' . implode(', ', $ids) . ')';
    $query = "SELECT $table2.id from $table1
      inner join $relTable on $table1.id = $relTable.$refId1
      inner join $table2 on $relTable.$refId2 = $table2.id
      where $table1.id in $strIds";
  } else {
    $id = $ids;
    $query = "SELECT $table2.id from $table1
      inner join $relTable on $table1.id = $relTable.$refId1
      inner join $table2 on $relTable.$refId2 = $table2.id
      where $table1.id = $id";
  }
  $prepare = pdo()->prepare($query);
  $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
  $data = array_column($data, 'id');
  return $data;
}



function insertQuery($values, $table)
{
  $strColumns = strKeys($values);
  $strHolders = strHolders($values);
  return "INSERT INTO $table (" . $strColumns . ") VALUES (" . $strHolders . ")";
}
function updateQuery($table, $values, int $id)
{
  $strSetValues = strSetValues($values);
  return "UPDATE $table SET $strSetValues WHERE id = $id";
}

function strKeys($values)
{
  return implode(', ', array_keys($values));
}
function strHolders($values)
{
  $keys = array_keys($values);
  if (count($values) == 0) {
    return '';
  }
  $strHolders = ':' . implode(', :', $keys);
  return $strHolders;
}
function strSetValues($values)
{
  $firstTime = true;
  $str = '';
  foreach ($values as $key => $value) {
    if (!$firstTime) {
      $str .= ', ';
    }
    $str .= $key . ' = :' . $value;
    $firstTime = false;
  }
  return $str;
}
function strArray($array)
{
  return '(' . implode(', ', $array) . ')';
}
