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
            <a href="bigblog.php?title=<?= $recset[0]["title"]; ?>" class="item1 mainblog">
                <h2 class="blogtitle"><?= $recset[0]["title"]; ?></h2>
                <h4 class="blogintro"><?= $recset[0]["intro"]; ?></h4>
                <img class="blogimg" src="img/blogimg/<?= $recset[0]["img"]; ?>" alt="">
                <p class="blogtxt"><?= $recset[0]["text"]; ?></p>
            </a>
            <a href="bigblog.php?title=<?= $recset[1]["title"]; ?>" class="item2 secblog">
                <img  class="secblogimg" src="img/blogimg/<?= $recset[1]["img"]; ?>" alt="">
                <h1 class="secblogtitle"><?= $recset[1]["title"]; ?></h1>
            </a>
            <a href="bigblog.php?title=<?= $recset[2]["title"]; ?>" class="item3 secblog">
                <img class="secblogimg" src="img/blogimg/<?= $recset[2]["img"]; ?>" alt="">
                <h1 class="secblogtitle"><?= $recset[2]["title"]; ?></h1>
            </a>
            <a class="btn item4" href="bloglist.php">
                <h1>See More</h1>
            </a>
        </div>
    </main>
</body>
</html>