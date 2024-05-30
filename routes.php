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
    '/note' => 'controller/note.php',
    '/note/create' => 'controller/note-create.php',
    '/notes' => 'controller/query.php'
];

if($routeExists($routes, $uri)){
    require $routeExists($routes, $uri);
}else{
    abort();
}
