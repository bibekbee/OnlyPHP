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
    $database->query("UPDATE notes SET title = :title WHERE id = :id", 
    [':title' => htmlspecialchars($input), ':id' => $_POST['id']]);
    header('location: /notes');
    exit();
}

$errors['name'] = $validator->validate($input_length);

view('notes/update.view.php', ['errors' => $errors, 'input' => $input, 'message' => '', 'id' => $_POST['id']]);