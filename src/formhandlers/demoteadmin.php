<?php
session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Geen toegang');
}

// Database credentials
require '../dbconnect/dbconnect.php';
require '../helpers/auth-helpers.php';

getLoggedInUserID();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('location: ../../login.php');
    exit();
}

$user_id2 = $_POST['userid'];

$dbconnect = new dbconnection();
$sql = "SELECT * FROM `users` WHERE id = $user_id2";
$query = $dbconnect -> prepare($sql);
$query -> execute();
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

if($recset[0]['username'] == 'RvSpijker') {
    die('leuk geprobeert');
}

$dbconnect = new dbconnection();
$sql = "UPDATE `users` SET `admin` = '0' WHERE id = $user_id2";
$query = $dbconnect -> prepare($sql);
$query -> execute();
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

echo 
'<script>
history.back()
</script>'; 