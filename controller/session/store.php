<?php

use Core\App;
use Core\Validator;
use Core\Authenticator;
use Core\Session;
$db = App::container()->resolve('Core\Database');

$errors = [];
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$validate = new Validator(6,255);

if($validate->check($email, $password)){
    $auth = new Authenticator;
    $result = $auth->attempt($email, $password, $db);
    if($result){
        login($result);
        redirect('/');
    }
}else{
    $errors = $validate->fail($email, $password);
    Session::flash('errors', $errors);
    redirect('/login');
}

    //If password was incorrect
    $errors = [
        'email' => '',
        'pass' => 'User not found try again!'
    ];

    Session::flash('errors', $errors);  
    redirect('/login');


