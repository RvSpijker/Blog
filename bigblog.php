<?php 
    include 'src/includes/header.php';
    
    $title = $_GET['title'];

    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM blog WHERE title = '$title' ORDER BY `blog`.`id` DESC";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);

?>
    <main>
        <div class="bigmainblog">
            <h2 class="bigblogtitle"><?= $recset[0]["title"]; ?></h2>
            <h4 class="bigblogintro"><?= $recset[0]["intro"]; ?></h4>
            <img class="bigblogimg" src="img/blogimg/<?= $recset[0]["img"]; ?>" alt="">
            <p class="bigblogtxt"><?= $recset[0]["text"]; ?></p>
            <div class="commentdiv">
                <img class="commentimg" src="img/user.png" alt="user">
                <h1 class="username">username</h1>
                <h2 class="commenttext">WOWOO!!!!!!!!!!!1aaaaaaaaa</h2>
            </div>
            <br>
            <div class="commentdiv">
                <img class="commentimg" src="img/user.png" alt="user">
                <h1 class="username">username</h1>
                <h2 class="commenttext">WOWOO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!   !!!!!!1aaaaaaaaa</h2>
            </div>
        </div>
    </main>
</body>
</html>