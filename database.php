<?php

class Database {
public $conn;
public $statement;
public function __construct($config, $username = 'root', $password = ''){
  $dsn = 'mysql:' . http_build_query($config, '', ';');
  try{
    $this->conn = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo "Connection failed " . $e->getMessage();
  }
}

public function query($query, $prams = []) {
      if($this->conn){
      $this->statement = $this->conn->prepare($query);
      $this->statement->execute($prams);
      }else{
        $this->statement = [];
      }
      return $this;
}

public function all(){
  if($this->statement != []){
     return $this->statement->fetchAll();
  }else{
    return $this->statement;
  }
}

public function find(){
  if($this->statement != []){
     return $this->statement->fetch();
  }else{
    return $this->statement;
  }
}

public function findorFail(){
  $result = $this->find(); 
  if($result == false){
    abort();
    die();
  }else{
    return $result;
  }
}

}

$config = require base_path('config.php');
$database = new Database($config['database']); 

