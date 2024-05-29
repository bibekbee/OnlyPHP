<?php

class Database {
public $conn;

public function __construct($config, $username = 'root', $password = ''){
  $dsn = 'mysql:' . http_build_query($config, '', ';');
  try{
    $this->conn = new PDO($dsn, $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo "Connection failed " . $e->getMessage();
  }
}

public function query($query) {
      if($this->conn){
      $statement = $this->conn->prepare($query);
      $statement->execute();
      return $statement;
      }else{
        return [];
      }
}

}





