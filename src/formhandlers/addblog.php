<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST') {
//     die('Geen toegang');
// }

// Database credentials
require '../dbconnect/dbcredentials.php';

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "../../img/blogimg/" . $filename;

move_uploaded_file($tempname, $folder);

// Connectie is geslaagd, dus nu kunnen we de gegevens vastleggen in de database
$title = htmlentities( $_POST['title'] );
$intro = htmlentities( $_POST['intro'] );
$text = htmlentities( $_POST['text'] );
$date = date("d-m-Y");

$sql = "INSERT INTO `blog`(`title`, `intro`, `img`, `text`, `date`)
        VALUES(:title, :intro, :img, :text, :date)";
$placeholders = [
    ':title' => $title,
    ':intro' => $intro,
    ':img' => $filename,
    ':text' => $text,
    ':date' => $date,
];

$db_statement = $db_connection->prepare($sql);
$db_statement->execute($placeholders);

// Na het succesvol vastleggen in de database laten we de gebruiker
// terugkeren naar het login scherm
header('location: ../../index.php');
exit();