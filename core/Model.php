<?php

namespace core;

use Exception;
use PDO;

class Model
{

  protected string $table;
  protected PDO $pdo;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=localhost;dbname=vngiasu', 'root', '');
  }

  protected static $instance;
  public static function obj(): static{
    if(!isset(static::$instance)){
      static::$instance = new static;
    }
    return static::$instance;
  }

  public function select(string $columns = '*', $ids = null)
  {
    $table = $this->table;
    if($ids == null){
      $query = "SELECT $columns from $table";
    }elseif(is_array($ids)){
      $strIds = '(' . implode(', ', $ids) . ')';
      $query = "SELECT $columns from $table where id in $strIds";
    }else{
      $id = $ids;
      $query = "SELECT $columns from $table where id = $id";
    }
    $prepare = $this->pdo->prepare($query);
    $prepare->execute();

    $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  public function get(int $id)
  {
    $table = $this->table;
    $query = "SELECT * from $table where id = $id";
    $prepare = $this->pdo->prepare($query);
    $prepare->execute();
    $result = $prepare->fetch(PDO::FETCH_ASSOC);
    return ($result) ? $result : false;
  }
  public function find(string $field, $value)
  {
    $table = $this->table;
    $query = "SELECT * FROM $table WHERE $field = :value";
    $prepare = $this->pdo->prepare($query);
    $prepare->execute([
      'value' => $value,
    ]);
    $result = $prepare->fetch(PDO::FETCH_ASSOC);
    return ($result) ? $result : false;
  }

  public function insert(array $values)
  {
    $table = $this->table;
    $query = insertQuery($values, $table);
    $prepare = $this->pdo->prepare($query);
    try{
      $prepare->execute($values);
      return $this->pdo->lastInsertId();
    }catch(Exception $e){
      return false;
    }
  }

  public function update(int $id, array $values)
  {
    $table = $this->table;
    $query = updateQuery($table, $values, $id);
    $prepare = $this->pdo->prepare($query);
    $prepare->execute($values);
  }

  public function delete(int $id)
  {
    $query = "DELETE FROM $this->table WHERE id = $id";
    $prepare = $this->pdo->prepare($query);
    $prepare->execute();
  }

  public function getReferences($ids, string $refTable, string $refId)
  {
    if (is_array($ids)) {
      $strIds = '(' . implode(', ', $ids) . ')';
      $query = "SELECT * FROM $refTable WHERE $refId IN $strIds";
    } else {
      $id = $ids;
      $query = "SELECT * from $refTable where $refId = $id";
    }
    $prepare = $this->pdo->prepare($query);
    $prepare->execute();
    $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $data = array_column($data, 'id');
    return $data;
  }

  public function getRelatives($ids, $table1, $table2, $relTable, $refId1, $refId2)
  {
    if(is_array($ids)){
      $strIds = '(' . implode(', ', $ids) . ')';
      $query = "SELECT $table2.id from $table1
      inner join $relTable on $table1.id = $relTable.$refId1
      inner join $table2 on $relTable.$refId2 = $table2.id
      where $table1.id in $strIds";
    }else{
      $id = $ids;
      $query = "SELECT $table2.id from $table1
      inner join $relTable on $table1.id = $relTable.$refId1
      inner join $table2 on $relTable.$refId2 = $table2.id
      where $table1.id = $id";
    }
    $prepare = $this->pdo->prepare($query);
    $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $data = array_column($data, 'id');
    return $data;
  }
}
