<?php
use Core\Session;
$errors = Session::getFlash('errors');

view('registration/create.view.php', ['errors' => $errors]);