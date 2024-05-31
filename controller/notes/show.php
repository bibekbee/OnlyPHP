<?php

 use Core\Database;

 $config = require base_path('config.php');
 $database = new Database($config['database']); 

 $id = $_GET['id'];
 $user_id = 1;
 $query = "SELECT * FROM notes where id = :id";
 $result = $database->query($query, [':id' => $id])->findorFail();

 authorize($result['user_id'], $user_id);
 view('notes/show.view.php', ['result' => $result]);
 