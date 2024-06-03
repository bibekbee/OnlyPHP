<?php

namespace Core;

class Validator{
    private $input;
    private $min;
    private $max;

    public function __construct($input, $min, $max){
        $this->input = $input;
        $this->min = $min;
        $this->max = $max;
    }

    function validate($length){
        if($this->input != '' && $length > $this->min && $length < $this->max){
            return true;
        }else{
            return false;
        }
    }

    function error($length){
          if($this->input == ''){
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