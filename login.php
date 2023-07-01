<?php 
    include 'src/includes/header.php'
?>
<main>
    <form class="inlogform" action="src/formhandlers/login.php" method="POST">
        <h1 class="formtitle">Inloggen</h1>
        <div class="inputdiv">
            <label for="email">Email</label><br>
            <input class="input" type="email" id="email" name="email" placeholder="example@example.com" />
        </div>
        <div class="inputdiv">
            <label for="wachtwoord">Wachtwoord</label><br>
            <input class="input" type="password" id="wachtwoord" name="password" placeholder="Wachtwoord" />
        </div>
        <button class="formbutton" type="submit">Inloggen</button>
    </form>
    <a class="registerlink" href="register.php"><h1 id="registerbutton">Create an account</h1></a>
</main>
<script src="js/main.js"></script>
</body>
</html>