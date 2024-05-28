<?php

$dsn = "mysql:host=localhost;port=3306;dbname=phpsql";
$username = "root";

try {
    // Create connection
    $conn = new PDO($dsn, $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    echo "Connected to database successfully!";
  
    //Your database operations here (prepared statements recommended)
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }