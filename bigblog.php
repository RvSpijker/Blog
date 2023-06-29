<?php 
    include 'src/includes/header.php';
    
    $title = $_GET['title'];

    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM blog WHERE title = '$title' ORDER BY `blog`.`id` DESC";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);

    $blog_id = $recset[0]["id"];

    $dbconnect = new dbconnection();
    $sql = "SELECT comments.text, users.username, users.profilepic FROM `comments` INNER JOIN users ON users.id=comments.user_id WHERE blog_id = '$blog_id'  ORDER BY `comments`.`id` DESC"; 
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $comments = $query -> fetchAll(PDO::FETCH_ASSOC);

    // print_r($comments);

    if($user_id == 0) {
        $user[0]["username"] = 'Login to Comment';
    }
?>
    <main>
        <div class="bigmainblog">
            <h2 class="bigblogtitle"><?= $recset[0]["title"]; ?></h2>
            <h4 class="bigblogintro"><?= $recset[0]["intro"]; ?></h4>
            <img class="bigblogimg" src="img/blogimg/<?= $recset[0]["img"]; ?>" alt="">
            <p class="bigblogtxt"><?= $recset[0]["text"]; ?></p>
            
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
        </div>
    </main>
</body>
</html>