<?php

use Core\App;
use Core\Validator;
$db = App::container()->resolve('Core\Database');

$errors = [];
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$validate = new Validator(6,255);

if($validate->check($email, $password)){
    $result = $db->query('SELECT * FROM user WHERE email = :email', [':email' => $email])->find();
    //chceking for the password match
    if($result && password_verify($password, $result['pass'])){
        login($result);
        redirect('/');
    }
}else{
    $errors = $validate->fail($email, $password);
    view('session/create.view.php', ['errors' => $errors]);
    exit();
}

    //If password was incorrect
    $errors['email'] = '';
    $errors['pass'] = 'User not found try again!';
    view('session/create.view.php', ['errors' => $errors]);
    exit();


