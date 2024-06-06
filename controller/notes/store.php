<?php

use Core\Validator;
use Core\App;
use Core\Session;
$database = App::container()->resolve('Core\Database');

$user_id = $_SESSION['id'];
$message = '';

   $input = trim($_POST['note']);
   $input_length = strlen($input);

   $validator = new Validator(3, 1000);
 
   if($validator->validate($input_length)){ 
      $database->query("INSERT INTO notes(title, user_id) VALUES(:title, :user_id)", 
      [':title' => htmlspecialchars($input), ':user_id' => $user_id]);
      redirect('/notes');
   }
      
$errors['name'] = $validator->error($input_length);
Session::flash('errors', $errors);
Session::flash('note', $input);
redirect('/note/create');
