<?php
 use Core\App;

 $database = App::container()->resolve('Core\Database');

 $query = "SELECT * FROM notes where user_id = :user_id";
 $results = $database->query($query, [':user_id' => 1])->all();
 $_SESSION['name'] = 'UserName';
 view('notes/index.view.php', ['results' => $results]);
 