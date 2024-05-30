<?php
require base_path('Validator.php');
$user_id = 1;
$errors = [];
$message = '';
$input = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $input = trim($_POST['note']);
   $input_length = strlen($input);
  
   $validator = new Validator($input, 3, 1000);

   if($validator->validate($input_length)){ 
      $database->query("INSERT INTO notes(title, user_id) VALUES(:title, :user_id)", 
      [':title' => htmlspecialchars($input), ':user_id' => $user_id]);
      $message =  "done";
   }

   $errors['name'] = $validator->error($input_length);
 
}

require base_path('views/notes/create.view.php');