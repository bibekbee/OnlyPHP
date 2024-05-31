<?php
 
 use Core\Database;

 $config = require base_path('Core/config.php');
 $database = new Database($config['database']); 

 $query = "SELECT * FROM notes where user_id = :user_id";
 $results = $database->query($query, [':user_id' => 1])->all();

 view('notes/index.view.php', ['results' => $results]);
