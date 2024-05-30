<?php
 
 $query = "SELECT * FROM notes where user_id = :user_id";
 $results = $database->query($query, [':user_id' => 1])->all();

 require base_path('views/notes/index.view.php');
