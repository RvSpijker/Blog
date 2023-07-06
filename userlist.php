<?php 
    include 'src/includes/header.php';

    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM users WHERE admin = 0";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);

    $dbconnect = new dbconnection();
    $sql = "SELECT * FROM users WHERE admin = 1";
    $query = $dbconnect -> prepare($sql);
    $query -> execute();
    $recset2 = $query -> fetchAll(PDO::FETCH_ASSOC);

    if ($user) {
        if($user[0]['admin'] != 1) {
            header('location: index.php');
            exit();
        }
    }
?>
    <main>
        <h1 class="userslisttitle">Users</h1>
<?php foreach($recset as $key => $value){ ?>
        <div class="userlistdiv">
            <div class="userlistflex">
                <div class="userlistgrid">
                    <img class="item9 profilepic" src="img/profilepic/<?= $recset[$key]['profilepic'] ?>" alt="">
                    <h2 class="item10">username:&nbsp;<?= $recset[$key]['username'] ?></h2>
                    <h2 class="item11">email:&nbsp;<?= $recset[$key]['email'] ?></h2>
                </div>
                <form class="push userlistform" method="POST" action="src/formhandlers/deleteuser.php">
                    <button class="addadminbtn rmvbtn" id="addadmin" name="userid" value="<?= $recset[$key]['id'] ?>">
                        <i class="addadmin fa-solid fa-user-minus"></i>
                        <label class="addadminlabel" for="addadmin">Delete User</label>
                    </button>
                </form>
                <form class="userlistform" method="POST" action="src/formhandlers/addadmin.php">
                    <button class="addadminbtn rmvbtn" id="addadmin" name="userid" value="<?= $recset[$key]['id'] ?>">
                        <i class="addadmin fa-solid fa-user-plus"></i>
                        <label class="addadminlabel" for="addadmin">Make Admin</label>
                    </button>
                </form>
            </div>
        </div>
<?php } ?>
        <h1 class="userslisttitle">Admins</h1>
<?php foreach($recset2 as $key => $value){ ?>
        <div class="userlistdiv">
            <div class="userlistflex">
                <div class="userlistgrid">
                    <img class="item9 profilepic" src="img/profilepic/<?= $recset2[$key]['profilepic'] ?>" alt="">
                    <h2 class="item10">username:&nbsp;<?= $recset2[$key]['username'] ?></h2>
                    <h2 class="item11">email:&nbsp;<?= $recset2[$key]['email'] ?></h2>
                </div>
                <form class="push userlistform" method="POST" action="src/formhandlers/demoteadmin.php">
                    <button class="addadminbtn rmvbtn" id="addadmin" name="userid" value="<?= $recset2[$key]['id'] ?>">
                        <i class="addadmin fa-solid fa-user-minus"></i>
                        <label class="addadminlabel" for="addadmin">Demote Admin</label>
                    </button>
                </form>
            </div>
        </div>
<?php } ?>
    </main>
<script src="js/main.js"></script>
</body>
</html>