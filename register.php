<?php 
    session_start();
    include 'src/includes/header.php';
?>
<main>
    <form class="inlogform" action="src/formhandlers/register.php" method="POST">
        <h1 class="formtitle">Registeren</h1>
        <div class="inputdiv">
            <label for="voornaam">Voornaam</label><br>
            <input class="input" type="text" id="voornaam" name="firstname" placeholder="Voornaam"/>
        </div>
        <div class="inputdiv">
            <label for="achternaam">Achternaam</label><br>
            <input class="input" type="text" id="achternaam" name="lastname" placeholder="Achternaam"/>
        </div>
        <div class="inputdiv">
            <label for="tussenvoegsels">Tussenvoegsels</label><br>
            <input class="input" type="text" id="tussenvoegsels" name="prefix" placeholder="Tussenvoegsels(optional)"/>
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