<?php

use Core\Validator;
use Core\App;
$database = App::container()->resolve('Core\Database');
$user_id = 1;
$message = '';

$input = trim($_POST['note']);
$input_length = strlen($input);

$validator = new Validator($input, 3, 1000);
if($validator->validate($input_length)){ 
    $database->query("UPDATE notes SET title = :title WHERE id = :id", 
    [':title' => htmlspecialchars($input), ':id' => $_POST['id']]);
    header('location: /notes');
 }

$errors['name'] = $validator->error($input_length);

view('notes/update.view.php', ['errors' => $errors, 'input' => $input, 'message' => '', 'id' => $_POST['id']]);