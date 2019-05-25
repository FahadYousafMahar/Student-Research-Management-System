<?php
namespace Myweb\Core\Database;
use PDO;
class QueryBuilder{
  protected $pdo;
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }
  public function query($table,$class,$clause)
  {
    $statement = $this->pdo->prepare("select * from {$table} {$clause}");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,"Myweb\\Classes\\{$class}");
  }
  public function customquery($query)
  {
    return ($this->pdo->query($query));
  }
  public function selectAll($table,$class)
  {
    $statement = $this->pdo->prepare("select * from {$table}");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,"Myweb\\Classes\\{$class}");
  }
  public function customselect($query)
  {
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }
  public function selectOne($table,$class,$col,$val)
  {
    $statement = $this->pdo->prepare("select * from {$table} where {$col} = '{$val}'");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,"Myweb\\Classes\\{$class}");
  }
  public function selectOneCount($table,$class,$col,$val)
  { 
    $statement = $this->pdo->prepare("select count(*) from {$table} where {$col} = '{$val}'");
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  public function insert($table,$parameters)
  {
    $sql = sprintf(
      "INSERT INTO %s (%s) VALUES (%s);",
      $table,
      implode(', ', array_keys($parameters)),
      ':'.implode(', :', array_keys($parameters))
    );
    $statement = $this->pdo->prepare($sql);
    return $statement->execute($parameters);
  }

  public function updatewhere($table,$parameters,$col,$val) 
  {
    $string = "update {$table} set ";
    foreach($parameters as $x => $x_value) {
        $string.= $x . " = '" . $x_value;
        $string.="', ";
    }
    $sql = trim(trim($string),',')." where $col = '{$val}'";
    $statement = $this->pdo->prepare($sql);
    return $myvar = $statement->execute($parameters);
  }
  
}
