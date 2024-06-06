<?php

use Core\App;
use Core\Validator;

$db = App::container()->resolve('Core\Database');

$errors = [];
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$validate = new Validator(6,255);

if($validate->check($email, $password)){
    $user_exist = $db->query("SELECT * from user WHERE email = :email", [':email' => $email])->find();
    //Check if user already exists
    if($user_exist){
        redirect('/');
    }
}else{
    $errors = $validate->fail($email, $password);
    view('registration/create.view.php', ['errors' => $errors]);
    exit();
}


 $db->query("INSERT INTO user(email,pass) VALUES(:email, :pass)", 
 [
    ':email' => $email,
    ':pass' => password_hash($password,PASSWORD_DEFAULT)
 ]);

 redirect('/');

