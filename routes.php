<?php


require 'data.php';
require 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controller/index.php',
    '/about' => 'controller/about.php',
    '/contacts' => 'controller/contact.php',
    '/query' => 'controller/query.php'
];

require $routeExists($routes, $uri) ? $routeExists($routes, $uri) : abort();

