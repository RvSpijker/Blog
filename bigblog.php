<?php 
    include 'src/includes/header.php';
    
    $id = $_GET['id'];
    $likeamount = 0;

    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM blog WHERE id = '$id' ORDER BY `blog`.`id` DESC";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);

    $blog_id = $recset[0]["id"];

    $dbconnect = new dbconnection();
    $sql = "SELECT comments.text, users.username, users.profilepic FROM `comments` INNER JOIN users ON users.id=comments.user_id WHERE blog_id = '$blog_id'  ORDER BY `comments`.`id` DESC"; 
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $comments = $query -> fetchAll(PDO::FETCH_ASSOC);

    // likes tellen
    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM `likes` WHERE blog_id = '$id'"; 
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $likes = $query -> fetchAll(PDO::FETCH_ASSOC);

    foreach($likes as $key => $value) {
        $likeamount++;
    }

    // kijken of de user geliked heeft
    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM likes WHERE user_id = '$user_id' AND blog_id = '$blog_id'";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $geliked = $query -> fetchAll(PDO::FETCH_ASSOC);

    if($geliked) {

    }


    // print_r($comments);

    if($user_id == 0) {
        $user[0]["username"] = 'Login to Comment';
        $user[0]["profilepic"] = 'user.png';
    }
?>
    <main>
        <div class="bigmainblog">
            <h2 class="bigblogtitle"><?= $recset[0]["title"]; ?></h2>
            <h4 class="bigblogintro"><?= $recset[0]["intro"]; ?></h4>
            <img class="bigblogimg" src="img/blogimg/<?= $recset[0]["img"]; ?>" alt="">
            <p class="bigblogtxt"><?= $recset[0]["text"]; ?></p>
            <div class="likes">
                <form action="src/formhandlers/likes.php" method="POST">
                    <button name="blog_id" value="<?= $blog_id ?>" class="heartbtn">
                        <?php if($geliked) { ?>
                        <i class="heart fa-solid fa-heart"></i> <?php } else { ?>
                        <i class="heart fa-regular fa-heart"></i> <?php } ?>
                    </button>
                </form>
                <h2 class="heartamount">&nbsp;<?= $likeamount ?></h2>
            </div>

            <form class="plc-commentdiv" action="src/formhandlers/comment.php" method="POST">
                <div class="grid-container3">
                    <img class="item8 plc-commentimg" src="img/profilepic/<?= $user[0]["profilepic"] ?>" alt="user">
                    <h1 class="item5 plc-username"><?= $user[0]["username"] ?></h1>
                    <input class="item6 plc-commenttext" type="text" name="text" placeholder="type here" required/>
                    <button value="<?= $blog_id ?>" name="blog_id" class="item7 plc-button" type="submit">Post</button>
                </div>
            </form>
            <br>
<?php foreach($comments as $key => $value) { ?>
            <div class="commentdiv">
                <img class="commentimg" src="img/profilepic/<?= $value['profilepic'] ?>" alt="user">
                <h1 class="username"><?= $value['username'] ?></h1>
                <h2 class="commenttext"><?= $value['text'] ?></h2>
            </div>
            <br>
<?php } ?>
        <h4 class="date"><?= $recset[0]['date'] ?></h4>
<?php
    if ($user) {
        if($user[0]['admin'] == 1) {
?>
        <a class="delete" href="#">
            <form action="src/formhandlers/deleteblog.php" method="POST">
                <button name="blog_id" value="<?=$blog_id?>" class="rmvbtn">
                    <i class="trash fa-solid fa-trash"></i><h2 class="trashtext">Delete Blog</h2>
                </button>
            </form>
        </a>
<?php } } ?>
        </div>
    </main>
<script src="js/main.js"></script>
</body>
</html>