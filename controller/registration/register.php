<?php

use Core\App;
use Core\Validator;

$db = App::container()->resolve('Core\Database');

$errors = [];
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$userlen = strlen($email);
$passlen = strlen($password);
//dd($_POST);

$validate_userName = new Validator($email,1,255);
$validate_Pass = new Validator($password,1,255);

if(!$validate_userName->validate($userlen) || !$validate_Pass->validate($passlen)){
    if(!$validate_userName->validate($userlen) && !$validate_Pass->validate($passlen)){
        $errors['email'] = $validate_userName->error($userlen);
        $errors['pass'] = $validate_userName->error($passlen);
    }else if(!$validate_userName->validate($userlen)){
        $errors['email'] = $validate_userName->error($userlen);
        $errors['pass'] = '';
    }else{
        $errors['email'] = '';
        $errors['pass'] = $validate_userName->error($passlen);
    }

    view('registration/create.view.php', ['errors' => $errors]);
    exit();
}

$user_exist = $db->query("SELECT * from user WHERE email = :email", [':email' => $email])->find();

if($user_exist){
    //Check if user already exists
    header('location: /');
}else{
    $db->query("INSERT INTO user(email,pass) VALUES(:email, :pass)", [':email' => $email, ':pass' => $password]);
    header('location: /');
}
