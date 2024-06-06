<?php
use Core\Session;
$errors = Session::getFlash('errors');

view('notes/create.view.php', ['errors' => $errors, 'input' => '', 'message' => '']);
