<?php
 require 'Database.php';

$database = new Database();
$results = $database->query('SELECT * FROM onlyPHP')->fetchAll(PDO::FETCH_ASSOC);
echo "<ul>";
foreach($results as $result){
echo "<li>". $result['title'] ."</li>"; 
}
echo "</ul>";