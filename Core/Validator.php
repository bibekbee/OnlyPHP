<?php

namespace Core;

class Validator{
    private $min;
    private $max;

    public function __construct($min = 1, $max = 1000){
        $this->min = $min;
        $this->max = $max;
    }

    function validLength($length){
        return ($length > $this->min && $length < $this->max);
    }

    function validate($input){
            if($this->validLength($input)){
                return true;
            }else{
                return false;
            }
    }

    function check($email, $password){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $validpass = $this->validLength(strlen($password));
            if($validpass){
                return true;
            }
        }

        return false;
    }

    function fail($email, $password){
            $invalidemail = filter_var($email, FILTER_VALIDATE_EMAIL);
            $invalidpass = $this->validLength(strlen($password));

            if(!$invalidemail && !$invalidpass){
                return ['email' => "Enter a valid email",
                        'pass' => "Password should be at least $this->min char long"];
            }else if(!$invalidemail){
                return ['email' => "Enter a valid email",
                        'pass' => ''];
            }else{
                return ['email' => '',
                        'pass' => "Password should be at least $this->min char long"];
            }
    }

    function error($length){
          if($length == 0){
           return 'Input is required';
          }else if($length < $this->min){
           return "Input too small need to be atleast $this->min char";
          }else if($length > $this->max){
           return "Input too big need to be less than $this->max char";
          }else{
            return '';
          }
    }
}