<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Geen toegang');
}

// Database credentials
require '../dbconnect/dbcredentials.php';

// Connectie is geslaagd, dus nu kunnen we de gegevens vastleggen in de database
$username = htmlentities( $_POST['username'] );
$lastname = htmlentities( $_POST['lastname'] );
$prefix = htmlentities( $_POST['prefix'] );
$email = htmlentities( $_POST['email'] );
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

require '../dbconnect/dbconnect.php';

$dbconnect = new dbconnection();

$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

$query = $dbconnect -> prepare($sql);

$query -> execute() ;

$recset = $query -> fetchAll(PDO::FETCH_ASSOC);


if($recset == false) {

$sql = "INSERT INTO `users`(`username`, `email`, `password`)
        VALUES(:username, :email, :password)";
$placeholders = [
    ':username' => $username,
    ':email' => $email,
    ':password' => $password,
];

$db_statement = $db_connection->prepare($sql);
$db_statement->execute($placeholders);

// Na het succesvol vastleggen in de database laten we de gebruiker
// terugkeren naar het login scherm
header('location: ../../login.php');
exit();
} 
else {
    echo 
    '<script> 
        localStorage.namecheck = 1;
        window.location.href = "../../register.php";
    </script>';
}