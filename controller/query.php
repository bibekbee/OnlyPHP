<?php
 require 'Database.php';
 $config = require 'config.php';
// $id = $_GET['id'];
 $database = new Database($config['database']); 
 $query = "SELECT * FROM notes";
 $results = $database->query($query)->fetchAll();

 require 'views/notes.view.php';
//  echo "<ul>";
//  foreach($results as $result){
//  echo "<li>". $result['title'] ."</li>"; 
//  }
//  echo "</ul>";