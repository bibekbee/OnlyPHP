<?php

$config = require base_path('config.php');
$getitems = filter($config['books'], function ($x){
    if($x['author'] == 'Plato'){
        return $x['name'];
    }; 
});

view('index.view.php', ['getitems' => $getitems]);