<?php 
    include 'src/includes/header.php';
?>
<main>
    <form class="inlogform" action="src/formhandlers/register.php" method="POST">
        <h1 class="formtitle">Registeren</h1>
        <div class="inputdiv">
            <label for="username">username</label><br>
            <input class="input" type="text" id="username" name="username" placeholder="username"/>
        </div>
        <div class="inputdiv">
            <label for="email">Email</label><br>
            <input class="input" type="email" id="email" name="email" placeholder="example@example.com"/>
        </div>
        <div class="inputdiv">
            <label for="wachtwoord">Wachtwoord</label><br>
            <input class="input" type="password" id="wachtwoord" name="password" placeholder="wachtwoord"/>
        </div>
        <button class="formbutton" type="submit">Registreren</button>
    </form>
</main>
<script>
if(localStorage.namecheck == 1){
    localStorage.namecheck = 0;
    alert("Naam / Email al in gebruik");
}
</script>