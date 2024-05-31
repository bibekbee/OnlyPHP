<?php
 use Core\App;
//  use Core\Database;

//  $config = require base_path('config.php');
//  $database = new Database($config['database']); 
 $database = App::container()->resolve('Core\Database');

 $query = "SELECT * FROM notes where user_id = :user_id";
 $results = $database->query($query, [':user_id' => 1])->all();

 view('notes/index.view.php', ['results' => $results]);
