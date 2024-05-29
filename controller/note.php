<?php

 $id = $_GET['id'];

 $query = "SELECT * FROM notes where id = :id";
 $result = $database->query($query, [':id' => $id])->fetch();

 require 'views/note.view.php';