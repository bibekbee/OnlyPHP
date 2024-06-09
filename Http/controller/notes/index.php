<?php
 use Core\App;

 $database = App::container()->resolve('Core\Database');
 $user = $_SESSION['id'];
 $query = "SELECT * FROM notes where user_id = :user_id";
 $results = $database->query($query, [':user_id' => $user])->all();
 $_SESSION['name'] = 'UserName';
 view('notes/index.view.php', ['results' => $results]);
 