<?php
$dbHost = '127.0.0.1'; 
$dbName = 'blog';
$dbUser = 'root';
$dbPass = '';

// Globale variabelen voor het werken met de database
$db_connection = null;
$db_statement = null;

// Connectie maken met de database
try {
    $db_connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
} catch(PDOException $error) {
    header('location: ../../register.php');
    exit(); // die()
}