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

if($user_id != $user_id2) {
    $dbconnect = new dbconnection();
    $sql = "DELETE FROM `users` WHERE id = $user_id2";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);
}


echo 
'<script>
history.back()
</script>'; 