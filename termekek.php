<?php
    session_start();
    include "osztalyok/Termek.php";
    include "adatkezeles.php";
    $termekek = adatokBetoltese("adatok/termekek.txt");

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Termékek</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/termekekeskutyak.css">
    <link rel="stylesheet" href="stilusok/termekek.css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Termékek</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<nav id="menu">
    <div id="menu-logo">Termékek</div>
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
        <a href="#" class="menu-link">
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
        <h3>Nálunk kapható termékek:</h3>
        <div class="grid-container">
            <?php foreach ($termekek as $termek) : ?>
                <div class="termek-doboz">
                    <img src="<?= "media/kepek/{$termek->getKep()}" ?>" alt="<?= $termek->getNev() ?>" title="<?= $termek->getNev() ?>" class="termek-kep">
                    <p><?= $termek->getNev() ?></p>
                    <p><?= $termek->getAr() ?> Ft</p>
                    <input type="button" value="Kosárba tesz" class="vasarlas-gomb">
                </div>
            <?php endforeach ?>

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