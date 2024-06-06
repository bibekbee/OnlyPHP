<?php
use Core\App;
use Core\Session;

$errors = Session::getFlash('errors');
$db = App::container()->resolve('Core\Database');

$request = $db->query("SELECT id, title FROM notes WHERE id = :id" , [':id' => $_GET['id']])->findorFail();

view('notes/update.view.php', ['errors' => $errors, 'input' => $request['title'], 'message' => '', 'id' => $request['id']]);