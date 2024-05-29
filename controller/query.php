<?php
 require 'Database.php';
 $config = require 'config.php';
 $id = $_GET['id'];
 $database = new Database($config['database']);
 $query = "SELECT * FROM onlyPHP where id = :id";
 $results = $database->query($query, [':id' => $id])->fetchAll();
 echo "<ul>";
 foreach($results as $result){
 echo "<li>". $result['title'] ."</li>"; 
 }
 echo "</ul>";