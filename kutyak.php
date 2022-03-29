<?php
    require "adatbazisKezelo.class.php";
    $adatbazis = new AdatbazisKezelo();
    $kutyak = $adatbazis -> tablaLekerdezAdatbazisbol("kutyak");
    print_r($kutyak);

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kutyák</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/termekekeskutyak.css">
    <link rel="stylesheet" href="stilusok/kutyak.css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>

<header>
    <h1>Kutyáink</h1>

    <h2>Az állatimádók oldala</h2>
</header>
<nav id="menu">
    <div id="menu-logo">Kutyáink</div>
    <input id="menu-toggle" type="checkbox"/>
    <div class="hamburger-gomb-container" onclick="hamburger()">
        <div class="hamburger-gomb"></div>
    </div>
    <div id="menu-bg"></div>
    <div id="menu-pontok">
        <a href="index.php" class="menu-link">
            <div class="menu-link-tartalom">Főoldal</div>
        </a>
        <a href="#" class="menu-link">
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
        <h3>Nálunk kapható kutyafajták:</h3>
        <div class="grid-container">

            <?php foreach ($kutyak as $kutya) : ?>
                <div class="kutya-doboz">
                    <div class="kutya-doboz-belso">
                        <div class="kutya-doboz-elol">
                            <img src="<?= "media/kepek/{$kutya["kep"]}" ?>" alt="<?= $kutya["nev"] ?>" class="kutya-kep">
                        </div>
                        <div class="kutya-doboz-hatul">
                            <h2><?= $kutya["nev"] ?></h2>
                            <div>
                                <input type="button" value="Kérem" class="vasarlas-gomb">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <div id="ugras-gomb" title="Oldal tetejere ugrik" class="hidden">
        <p>/\<br>|</p>
    </div>
</main>
<footer>
    <em>© A weboldalt készítette: Tóth Edina és Ördög Csaba</em>
</footer>
<script src="szkriptek/script.js"></script>
</body>
</html>