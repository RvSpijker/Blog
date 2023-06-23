<?php
session_start();
require 'src/helpers/auth-helpers.php';
require 'src/dbconnect/dbconnect.php';

//user id krijgen
getLoggedInUserID();
$user_id = $_SESSION['user_id'];


$dbconnect = new dbconnection();
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute() ;
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

print_r($recset);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon2.gif" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ded3297a45.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a class="a-title" href="index.php">
            <h1 class="title">Naam Blog</h1>
        </a>
        <a href="login.php">
            <div class="logindiv">
                <i class="user fa-solid fa-user"></i>
                <h3 class="login">Inloggen</h3>
            </div>
        </a>
<?php if($recset[0]['admin'] == 1) { ?>
        <a href="#">
            <div class="blogdiv logindiv">
                <i class="user fa-solid fa-circle-plus"></i>
                <h3 class="login">Add Blog</h3>
            </div>
        </a>
<?php } ?>
    </header>