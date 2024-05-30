<?php

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function filter($items, $fn){
    $string_greetings = [];

    foreach($items as $item){
        $string_greetings[] = $fn($item);
    }

    return $string_greetings;
}

$getitems = filter($books, function ($x){
    if($x['author'] == 'Plato'){
        return $x['name'];
    }; 
});


function abort($code = 404) {
    http_response_code($code);
    if($code == 404){
    $err_message = "Page Not Found";
    }else if($code == 403){
    $err_message = "Unauthorized";
    }else{
    $err_message = "Sorry Some Error Occurred";
    }

    return require 'views/404.view.php';
  
    die();
}

$routeExists = function ($routes, $uri) {
    foreach ($routes as $key => $value) {
        if($key == $uri){
            return $value;
        }
      }
        return false;
      };


