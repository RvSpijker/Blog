<?php 
    include 'src/includes/header.php'
?>
<main>
    <h1 class="profiletitle">Profile</h1>
    <div class="profilediv">
        <form class="profileform" action="src/formhandlers/editprofile.php" method="POST" enctype="multipart/form-data">
            <div class="imgdiv2">
                <img class="profilepic" src="img/profilepic/<?= $user[0]['profilepic'] ?>" alt="">
                <!-- <div class="upload-btn-wrapper">
                    <button class="btn2">Change</button>
                    <input type="file" name="profileimg"/>
                </div> -->
            </div>
            <h2 class="name2">username:&nbsp;</h2>
            <input class="editusername" type="text" name="name" value="<?= $user[0]['username'] ?>"/>
            <br>
            <h2 class="email2">email:&nbsp;</h2>
            <input class="editemail" type="email" name="email" value="<?= $user[0]['email'] ?>"/>
            <input type="file" name="uploadfile"/>
            <button class="profilebtn1" type="submit">Confirm</button>
        </form>
        <button onclick="window.location.href='profile.php';" class="profilebtn2">Cancel</button>
    </div>
</main>
</body>
</html>