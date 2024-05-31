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
           return 'Empty note cannot be submitted';
          }else if($length < $this->min){
           return 'Note too small need to be atleast 3 char';
          }else if($length > $this->max){
           return 'Note too big need to be less than 1000 char';
          }else{
            return '';
          }
    }
}