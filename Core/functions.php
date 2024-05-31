<?php

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function filter($items, $fn){
    $string_greetings = [];

    foreach($items as $item){
        $string_greetings[] = $fn($item);
    }

    return $string_greetings;
}


function abort($code = 404) {
    http_response_code($code);
    if($code == 404){
    $err_message = "Page Not Found";
    }else if($code == 403){
    $err_message = "Unauthorized";
    }else{
    $err_message = "Sorry something went wrong!";
    }

    return require base_path('views/404.view.php');

}

function authorize($data, $user_id){
    if($data !== $user_id){
        abort(403);
        die();
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = []){
    extract($attributes);
    require base_path('views/' . $path);
}

$config = require base_path('config.php');
$getitems = filter($config['books'], function ($x){
    if($x['author'] == 'Plato'){
        return $x['name'];
    }; 
});

