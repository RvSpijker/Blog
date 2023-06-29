<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST') {
//     die('Geen toegang');
// }

session_start();
require '../helpers/auth-helpers.php';

//user id krijgen
getLoggedInUserID();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die('je ben tniet ingelogt');
}

// Database credentials
require '../dbconnect/dbconnect.php';
require '../dbconnect/dbcredentials.php';


$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "../../img/profilepic/" . $filename;

move_uploaded_file($tempname, $folder);

// Connectie is geslaagd, dus nu kunnen we de gegevens vastleggen in de database
$name = htmlentities( $_POST['name'] );
$email = htmlentities( $_POST['email'] );

// echo $user_id;
// echo $name;
// echo $email;
// echo $filename;

$dbconnect = new dbconnection();

$sql = "SELECT * FROM users WHERE username = '$name' OR email = '$email'";

$query = $dbconnect -> prepare($sql);

$query -> execute() ;

$recset = $query -> fetchAll(PDO::FETCH_ASSOC);


if($recset[1] == false) {


$dbconnect = new dbconnection();
$sql = "UPDATE users SET username='$name', email='$email' WHERE id = '$user_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute();


if($filename != false) {
    $dbconnect = new dbconnection();
    $sql = "UPDATE users SET profilepic='$filename' WHERE id = '$user_id'";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
}
// Na het succesvol vastleggen in de database laten we de gebruiker
// terugkeren naar het login scherm
// header('location: ../../index.php');
// exit();

echo 
header('location: ../../profile.php');
} else {
    echo 
    '<script> 
        localStorage.namecheck = 1;
        window.location.href = "../../editprofile.php";
    </script>';
}