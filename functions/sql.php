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
  // try {
    $prepare->execute($values);
  // } catch (Exception $e) {
  //   return false;
  // }
  return $prepare;
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
