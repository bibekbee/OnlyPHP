<?php 
use Core\Session;
$errors = Session::getFlash('errors');

view('session/create.view.php', ['errors' => $errors]);