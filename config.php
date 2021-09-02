<?php

$host       = "localhost";
$username   = "uhjzx1cghnhty";
$password   = "huj9gkqxivx8";
$dbname     = "dbpwqvgfcw0ipr"; 
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