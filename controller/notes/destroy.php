<?php
use Core\App;

$database = App::container()->resolve('Core\Database');

$id = $_POST['id'];

$database->query("DELETE FROM notes WHERE id = :id", [':id' => $id]);

header('location: /notes');