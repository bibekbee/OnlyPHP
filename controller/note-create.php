<?php
$user_id = 1;
$errors = [];
$message = '';
$input = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $input = trim($_POST['note']);
   $input_length = strlen($input);
   if($input != '' && $input_length > 3 && $input_length < 1000){ 
   $database->query("INSERT INTO notes(title, user_id) VALUES(:title, :user_id)", 
   [':title' => htmlspecialchars($input), ':user_id' => $user_id]);
   $message =  "done";
   }

   if($input == ''){
     $errors['name'] = 'Empty note cannot be submitted';
   }else if($input_length < 3){
     $errors['name'] = 'Note too small need to be atleast 3 char';
   }else if($input_length > 1000){
     $errors['name'] = 'Note too big need to be less than 1000 char';
   }else{
     null;
   }
   
}


require 'views/note-create.view.php';