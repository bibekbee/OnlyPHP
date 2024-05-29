<?php

class Database {
private $dsn = "mysql:host=localhost;dbname=myapp";
private $username = "root";

private function connect(){
  try{
    $conn = new PDO($this->dsn, $this->username);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo "Connection established successfully!";
    return $conn;
  }catch(PDOException $e){
    echo "Connection failed " . $e->getMessage(); 
    return null;
  }
}

public function fetchData() {
      $conn = $this->connect();
      if($conn){
      $statement = $conn->prepare('SELECT * FROM onlyPHP');
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results;
      }else{
        return '';
      }
}

}


$database = new Database();
$results = $database->fetchData();

echo "<pre>";
var_dump($results);
echo "</pre>";


