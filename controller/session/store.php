<?php

use Core\App;
$db = App::container()->resolve('Core\Database');

$email = $_POST['email'];
$pass = $_POST['password'];

$result = $db->query('SELECT * FROM user WHERE email = :email', [':email' => $email])->find();


if($result && $result['pass'] == $pass){
    $_SESSION['user'] = $result['email'];
}else{
    dd("no such user");
}

