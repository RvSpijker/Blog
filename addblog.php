<?php 
    include 'src/includes/header.php'
?>
<main>
    <form class="b-inlogform" action="src/formhandlers/addblog.php" method="POST" enctype="multipart/form-data">
        <h1 class="b-formtitle">Add Blog</h1>
        <div class="b-inputdiv">
            <label for="title">title</label><br>
            <input class="b-input" type="text" id="title" name="title" placeholder="title"/>
        </div>
        <div class="b-inputdiv">
            <label for="intro">intro</label><br>
            <textarea class="b-inputintro" type="text" id="intro" name="intro" placeholder="intro"></textarea>
        </div>
        <div class="b-inputdiv">
            <label for="img">img</label><br>
            <input class="b-input" type="file" id="img" name="uploadfile" placeholder="img"/>
        </div>
        <div class="b-inputdiv">
            <label for="text">text</label><br>
            <textarea class="b-inputtext" type="text" id="text" name="text" placeholder="text"></textarea>
        </div>
        <button class="b-formbutton" type="submit">Post</button>
    </form>
</main>
</body>
</html>
<!-- $dbconnect = new dbconnection();
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$query = $dbconnect -> prepare($sql);
$query -> execute() ;
$recset = $query -> fetchAll(PDO::FETCH_ASSOC); -->