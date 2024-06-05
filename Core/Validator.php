<?php

namespace Core;

class Validator{
    private $min;
    private $max;

    public function __construct($min = 1, $max = 1000){
        $this->min = $min;
        $this->max = $max;
    }

    function validate($input, $type = 'text'){
        if($type == 'text'){
            if($input != 0 && $input > $this->min && $input < $this->max){
                return 'true';
            }else{
                return $this->errorText($input);
            }
        }else if($type == 'email'){
            if(filter_var($input, FILTER_VALIDATE_EMAIL)){
                return 'true';
            }else{
                return 'please enter a valid email';
            }
        }
    }

    function errorText($length){
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