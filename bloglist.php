<?php 
    include 'src/includes/header.php';

    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM blog ORDER BY `blog`.`id` DESC";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <div class="grid-container2">
<?php foreach($recset as $key => $value){ ?>
        <a href="bigblog.php?title=<?= $value["title"]; ?>" class="secblog">
            <img  class="secblogimg" src="img/blogimg/<?= $value["img"]; ?>" alt="">
            <h1 class="secblogtitle"><?= $value["title"]; ?></h1>
        </a>
        <?php } ?>
    </div>
</main>
</body>
</html>
