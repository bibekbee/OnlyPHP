<?php

 $id = $_GET['id'];
 $user_id = 1;
 $query = "SELECT * FROM notes where id = :id";
 $result = $database->query($query, [':id' => $id])->findorFail();

 authorize($result['user_id'], $user_id);
 require base_path('views/notes/show.view.php');
 