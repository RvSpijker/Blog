<?php 
    include 'src/includes/header.php';

    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM blog ORDER BY `blog`.`id` DESC";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);
?>
    <main>
        <div class="grid-container">
            <a href="bigblog.php?id=<?= $recset[0]["id"]; ?>" class="item1 mainblog">
                <h2 class="blogtitle"><?= $recset[0]["title"]; ?></h2>
                <h4 class="blogintro"><?= $recset[0]["intro"]; ?></h4>
                <img class="blogimg" src="img/blogimg/<?= $recset[0]["img"]; ?>" alt="">
                <p class="blogtxt"><?= $recset[0]["text"]; ?></p>
            </a>
            <a href="bigblog.php?id=<?= $recset[1]["id"]; ?>" class="item2 secblog">
                <img  class="secblogimg" src="img/blogimg/<?= $recset[1]["img"]; ?>" alt="">
                <input class="secblogtitle" value="<?= $recset[1]["title"]; ?>" disabled/>
            </a>
            <a href="bigblog.php?id=<?= $recset[2]["id"]; ?>" class="item3 secblog">
                <img class="secblogimg" src="img/blogimg/<?= $recset[2]["img"]; ?>" alt="">
                <input class="secblogtitle" value="<?= $recset[2]["title"]; ?>" disabled/>
            </a>
            <a class="btn item4" href="bloglist.php">
                <h1>See More</h1>
            </a>
        </div>
    </main>
<script src="js/main.js"></script>
</body>
</html>