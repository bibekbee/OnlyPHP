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
    $database->query("UPDATE notes SET title = :title WHERE id = :id", 
    [':title' => htmlspecialchars($input), ':id' => $_POST['id']]);
    header('location: /notes');
    exit();
}

$errors['name'] = $validator->error($input_length);
Session::flash('errors', $errors);
Session::flash('note', $input);
$id = $_POST['id'];
redirect("/note/edit?id=$id");
