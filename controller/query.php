<?php
 
 $query = "SELECT * FROM notes";
 $results = $database->query($query)->fetchAll();

 require 'views/notes.view.php';
