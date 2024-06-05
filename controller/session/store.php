<?php

use Core\App;
use Core\Validator;
$db = App::container()->resolve('Core\Database');

$errors = [];
$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$userlen = strlen($email);
$passlen = strlen($pass);

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

    view('session/create.view.php', ['errors' => $errors]);
    exit();
}

$result = $db->query('SELECT * FROM user WHERE email = :email', [':email' => $email])->find();

if($result && password_verify($pass, $result['pass'])){
    login($result);
    header('location: /');
    exit();
}else{
    $errors['email'] = '';
    $errors['pass'] = 'User not found try again!';
    view('session/create.view.php', ['errors' => $errors]);
    exit();
}

