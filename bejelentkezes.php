<?php
    session_start();
    //Bejelentkezés kezelése
    include "menusav.php";
    //TODO le kéne ellenőrizni a felhasználónevet és a jelszavat
    // és ha helyesek, akkor "beléptetni" a felhasználót (mondjuk $_SESSION["felhasznalo"]-ban tárolni
    if(isset($_POST["login-btn"])){

    }

?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/regisztracio.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("bejelentkezes"); ?>
<main>

    <section class="kint">
        <h3>Bejelentkezés</h3>
        <div class="login">
            <form action="#" method="post" autocomplete="off">
                <fieldset>
                    <label for="usname">Felhasználónév:</label>
                    <input type="text" name="uname" id="usname" maxlength="20" placeholder="kutyaimado12" required
                           class="form-input">

                    <label for="pswd">Jelszó:</label>
                    <input type="password" name="password" id="pswd" maxlength="25" required class="form-input">

                </fieldset>
                <input type="submit" name="login-btn" value="Bejelentkezés" class="form-input gomb">
            </form>
        </div>
    </section>
    <div id="ugras-gomb" title="Oldal tetejere ugrik" class="hidden">
        <p>/\<br>|</p>
    </div>

</main>
<?php
include_once "lablec.php";
?>

<script src="szkriptek/script.js"></script>
</body>
</html>