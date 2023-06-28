<?php
session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Geen toegang');
}

// Database credentials
require '../dbconnect/dbcredentials.php';
require '../helpers/auth-helpers.php';

getLoggedInUserID();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('location: ../../login.php');
    exit();
}

$blog_id = $_POST['blog_id'];
// Connectie is geslaagd, dus nu kunnen we de gegevens vastleggen in de database
$text = htmlentities($_POST['text'] );

// echo $user_id;
// echo $blog_id;
// echo $text;


$sql = "INSERT INTO `comments`(`blog_id`, `user_id`, `text`)
        VALUES(:blog_id, :user_id, :text)";
$placeholders = [
    ':blog_id' => $blog_id,
    ':user_id' => $user_id,
    ':text' => $text,
];

$db_statement = $db_connection->prepare($sql);
$db_statement->execute($placeholders);

echo 
'<script>
history.back()
</script>'; 