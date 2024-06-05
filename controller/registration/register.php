<?php

use Core\App;
use Core\Validator;

$db = App::container()->resolve('Core\Database');

$errors = [];
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$userlen = strlen($email);
$passlen = strlen($password);

$validate = new Validator(6,255);

if($validate->validate($email, 'email') != 'true' || $validate->validate($passlen) != 'true'){
    if($validate->validate($email, 'email') != 'true' && $validate->validate($passlen) != 'true'){
        $errors['email'] = $validate->validate($email, 'email');
        $errors['pass'] = $validate->validate($passlen);
    }else if($validate->validate($email, 'email') != 'true'){
        $errors['email'] = $validate->validate($email, 'email');
        $errors['pass'] = '';
    }else{
        $errors['email'] = '';
        $errors['pass'] = $validate->validate($passlen);
    }

    view('registration/create.view.php', ['errors' => $errors]);
    exit();
}

$user_exist = $db->query("SELECT * from user WHERE email = :email", [':email' => $email])->find();

if($user_exist){
    //Check if user already exists
    header('location: /');
    exit();
}else{
    $db->query("INSERT INTO user(email,pass) VALUES(:email, :pass)", [':email' => $email, ':pass' => password_hash($password,PASSWORD_DEFAULT)]);
    $_SESSION['user'] = $email;
    header('location: /');
    exit();
}
