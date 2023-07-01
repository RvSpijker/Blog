<?php 
    include 'src/includes/header.php';

    if(!$user) {
        header('location: login.php');
        die();
    }
?>
<main>
    <h1 class="profiletitle">Profile</h1>
    <div class="profilediv">
        <div class="imgdiv">
            <img class="profilepic" src="img/profilepic/<?= $user[0]['profilepic'] ?>" alt="">
            <h2 class="profilepictext"></h2>
        </div>
        <h2 class="name">username:&nbsp;<?= $user[0]['username'] ?></h2>
        <h2 class="email">email:&nbsp;<?= $user[0]['email'] ?></h2>
        <button onclick="window.location.href='editprofile.php';" class="profilebtn1">Edit</button>
        <button onclick="window.location.href='src/formhandlers/logout.php';" class="profilebtn2">Logout</button>
    </div>
</main>
<script>
if(localStorage.namecheck == 1){
    localStorage.namecheck = 0;
    alert("Naam / Email al in gebruik");
}
</script>
<script src="js/main.js"></script>
</body>
</html>