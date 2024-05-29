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
    '/notes' => 'controller/query.php'
];

require $routeExists($routes, $uri) ? $routeExists($routes, $uri) : abort();

