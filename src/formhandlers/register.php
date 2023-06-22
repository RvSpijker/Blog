<?php

// Database credentials
require '../dbconnect/dbcredentials.php';

// Connectie is geslaagd, dus nu kunnen we de gegevens vastleggen in de database
$firstname = htmlentities( $_POST['firstname'] );
$lastname = htmlentities( $_POST['lastname'] );
$prefix = htmlentities( $_POST['prefix'] );
$email = htmlentities( $_POST['email'] );

$sql = "INSERT INTO `users`(`firstname`, `lastname`, `prefix`, `email`, `password`)
        VALUES(:firstname, :lastname, :prefix, :email, :password)";
$placeholders = [
    ':firstname' => $firstname,
    ':lastname' => $lastname,
    ':prefix' => $prefix,
    ':email' => $email,
    ':password' => $password,
];

$db_statement = $db_connection->prepare($sql);
$db_statement->execute($placeholders);

// Na het succesvol vastleggen in de database laten we de gebruiker
// terugkeren naar het login scherm
// header('location: ../../inlog.php');
// exit();