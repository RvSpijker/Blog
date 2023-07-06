<?php
session_start();

// Database credentials
require '../dbconnect/dbconnect.php';

$blog_id = $_POST['blog_id'];

$dbconnect = new dbconnection();
$sql = "DELETE FROM blog WHERE id = '$blog_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute();

header('location: ../../index.php');
exit();