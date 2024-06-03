<?php

 use Core\App;
 
 $database = App::container()->resolve('Core\Database');

 $id = $_GET['id'];
 $user_id = 1;
 $query = "SELECT * FROM notes where id = :id";
 $result = $database->query($query, [':id' => $id])->findorFail();

 authorize($result['user_id'], $user_id);
 view('notes/show.view.php', ['result' => $result]);
 