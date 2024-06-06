<?php

use Core\Router;
use Core\Session;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

$route = new Router;
$route->get('/','controller/index.php');
$route->get('/about', 'controller/about.php');
$route->get('/contacts', 'controller/contact.php');

$route->get('/note', 'controller/notes/show.php');
$route->delete('/note', 'controller/notes/destroy.php');

$route->get('/note/create', 'controller/notes/create.php');
$route->post('/note/store', 'controller/notes/store.php');

$route->get('/note/edit', 'controller/notes/edit.php');
$route->patch('/note/update', 'controller/notes/update.php');

$route->get('/notes', 'controller/notes/index.php')->only('auth');

$route->get('/register', 'controller/registration/create.php')->only('guest');
$route->post('/register', 'controller/registration/register.php');

$route->get('/login', 'controller/session/create.php');
$route->post('/login', 'controller/session/store.php');
$route->delete('/logout', 'controller/session/destroy.php');

$route->route($uri, $method);

Session::clearFlash();



