<?php
use Core\Database;

$config = require base_path('config.php');
$database = new Database($config['database']); 
$id = $_POST['id'];

$database->query("DELETE FROM notes WHERE id = :id", [':id' => $id]);

header('location: /notes');