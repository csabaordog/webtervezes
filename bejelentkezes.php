<?php
    session_start();
    //Bejelentkezés kezelése

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
<nav id="menu">
    <div id="menu-logo">Bejelentkezés</div>
    <input id="menu-toggle" type="checkbox"/>
    <div class="hamburger-gomb-container" onclick="hamburger()">
        <div class="hamburger-gomb"></div>
    </div>
    <div id="menu-bg"></div>
    <div id="menu-pontok">
        <a href="index.php" class="menu-link">
            <div class="menu-link-tartalom">Főoldal</div>
        </a>
        <a href="kutyak.php" class="menu-link">
            <div class="menu-link-tartalom">Kutyák</div>
        </a>
        <a href="termekek.php" class="menu-link">
            <div class="menu-link-tartalom">Termékek</div>
        </a>
        <a href="erdekessegek.php" class="menu-link">
            <div class="menu-link-tartalom">Érdekességek</div>
        </a>
        <a href="kapcsolat.php" class="menu-link">
            <div class="menu-link-tartalom">Kapcsolat</div>
        </a>
        <a href="beallitasok.php" class="menu-link">
            <div class="menu-link-tartalom">Beállítások</div>
        </a>
        <a href="#" class="menu-link">
            <div class="menu-link-tartalom">Bejelentkezés</div>
        </a>
        <a href="regisztracio.php" class="menu-link">
            <div class="menu-link-tartalom">Regisztráció</div>
        </a>
    </div>
</nav>
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