<?php

require BASE_PATH . 'data.php';
require BASE_PATH . 'functions.php';

require base_path('Database.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'controller/index.php',
    '/about' => 'controller/about.php',
    '/contacts' => 'controller/contact.php',
    '/note' => 'controller/notes/show.php',
    '/note/create' => 'controller/notes/create.php',
    '/notes' => 'controller/notes/index.php'
];

if($routeExists($routes, $uri)){
    require base_path($routeExists($routes, $uri));
    
}else{
    abort();
}
