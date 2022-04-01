<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kapcsolat</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css">
    <link rel="stylesheet" href="stilusok/kapcsolat.css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
    <script src="szkriptek/fontawesome.js"></script>
</head>
<body>
<header>
    <h1>Kapcsolat</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<nav id="menu">
    <div id="menu-logo">Kapcsolat</div>
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
        <a href="#" class="menu-link">
            <div class="menu-link-tartalom">Kapcsolat</div>
        </a>
        <a href="beallitasok.php" class="menu-link">
            <div class="menu-link-tartalom">Beállítások</div>
        </a>
        <a href="bejelentkezes.php" class="menu-link">
            <div class="menu-link-tartalom">Bejelentkezés</div>
        </a>
        <a href="regisztracio.php" class="menu-link">
            <div class="menu-link-tartalom">Regisztráció</div>
        </a>
    </div>
</nav>
<main>
    <section class="kint">
        <div id="terkep"></div>
        <h3>Elérhetőségeink</h3>
        <ul id="elerhetosegek">
            <li><i class="fas fa-phone-alt"> </i>
                Tel.: 067023222
            </li>
            <li><i class="fas fa-map-marker-alt" > </i>
                Szeged, Dugonics tér
            </li>
            <li><i class="fas fa-envelope"> </i>
                kutyabirodalom2022@gmail.com
            </li>
        </ul>
    </section>


    <div id="ugras-gomb" title="Oldal tetejere ugrik" class="hidden">
        <p>/\<br>|</p>
    </div>

</main>

<footer>
    <em>© A weboldalt készítette: Tóth Edina és Ördög Csaba</em>
</footer>
<script src="szkriptek/script.js"></script>
<script src="szkriptek/kapcsolat.js"></script>

<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwTZaENTajDpz70qNjUpQzkCmxMzBOKds&callback=initMap&v=weekly"
        async
></script>


</body>


</html>