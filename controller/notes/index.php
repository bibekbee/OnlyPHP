<?php
 
 $query = "SELECT * FROM notes where user_id = :user_id";
 $results = $database->query($query, [':user_id' => 1])->all();

 view('notes/index.view.php', ['results' => $results]);
