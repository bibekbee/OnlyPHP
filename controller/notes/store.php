<?php

use Core\Validator;
use Core\App;

$database = App::container()->resolve('Core\Database');

$user_id = $_SESSION['id'];
$message = '';

   $input = trim($_POST['note']);
   $input_length = strlen($input);

   $validator = new Validator(3, 1000);
 
   if($validator->validate($input_length) == 'true'){ 
      $database->query("INSERT INTO notes(title, user_id) VALUES(:title, :user_id)", 
      [':title' => htmlspecialchars($input), ':user_id' => $user_id]);
      header('location: /notes');
      exit();
   }else{
      $errors['name'] = $validator->validate($input_length);
   }


view('notes/create.view.php', ['errors' => $errors, 'input' => $input, 'message' => $message]);