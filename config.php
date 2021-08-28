<?php

$host       = "127.0.0.1:8889";
$username   = "root";
$password   = "root";
$dbname     = "bewdproject1"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
                    
/* Attempt to connect to MySQL database */
try{
  $pdo_connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}

?>