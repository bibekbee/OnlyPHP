<?php
 
 $query = "SELECT * FROM notes";
 $results = $database->query($query)->all();

 require 'views/notes.view.php';
