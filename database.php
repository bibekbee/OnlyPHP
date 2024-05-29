<?php

$dsn = "mysql:host=localhost;dbname=myapp";
$username = "root";

try{
  $conn = new PDO($dsn, $username);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  echo "Connection established successfully!";
  displayData($conn);

}catch(PDOException $e){
  echo "Connection failed " . $e->getMessage(); 
}

function displayData($conn){
  $statement = $conn->prepare('SELECT * FROM onlyPHP');
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_ASSOC);

  echo "<ul>";
  foreach($results as $result){
    echo "<li>". $result['title'] . "</li>";
  }
  echo "</ul>";
}
