<?php

require 'data.php';
require 'functions.php';
require 'Database.php';

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
    require $routeExists($routes, $uri);
}else{
    abort();
}
