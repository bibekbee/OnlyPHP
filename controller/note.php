<?php

 $id = $_GET['id'];
 $user_id = 1;
 $query = "SELECT * FROM notes where id = :id";
 $result = $database->query($query, [':id' => $id])->fetch();

 if($result == false){
   abort();
 }else if($result['user_id'] !== $user_id){
    abort(403);
 }else{
 require 'views/note.view.php';
 }