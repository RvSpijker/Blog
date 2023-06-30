<?php
session_start();

// Database credentials
require '../dbconnect/dbconnect.php';
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


$dbconnect = new dbconnection();
$sql = "SELECT * FROM likes WHERE user_id = '$user_id' AND blog_id = '$blog_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute();
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);


if($recset) {
    $dbconnect = new dbconnection();
    $sql = "DELETE FROM likes WHERE user_id = '$user_id' AND blog_id = '$blog_id'";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
} else {   
    $sql = "INSERT INTO `likes`(`blog_id`, `user_id`)
            VALUES(:blog_id, :user_id)";
    $placeholders = [
        ':blog_id' => $blog_id,
        ':user_id' => $user_id,
    ];
    
    $db_statement = $db_connection->prepare($sql);
    $db_statement->execute($placeholders);   
}


echo 
'<script>
history.back()
</script>'; 