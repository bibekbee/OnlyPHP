<?php

namespace Core;

class Authenticator{

    public function attempt($email, $password, $db){
        $result = $db->query('SELECT * FROM user WHERE email = :email', [':email' => $email])->find();
        if($result && password_verify($password, $result['pass'])){
            return $result;
        }else{
            return false;
        }
    }

}