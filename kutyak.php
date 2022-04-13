<?php
    session_start();
    include "menusav.php";
    include "osztalyok/Kutya.php";
    include "adatkezeles.php";
    include_once "osztalyok/Felhasznalo.php";
    $kutyak = adatokBetoltese("adatok/kutyak.txt");
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
<?php navigacioGeneralasa("kutyak"); ?>
<main>
    <section class="kint">
        <h3>Nálunk kapható kutyafajták:</h3>
        <div class="grid-container">

            <?php foreach ($kutyak as $kutya) : ?>
                <div class="kutya-doboz">
                    <div class="kutya-doboz-belso">
                        <div class="kutya-doboz-elol">
                            <img src="<?= "media/kepek/{$kutya->getKep()}" ?>" alt="<?= $kutya->getNev() ?>" class="kutya-kep">
                        </div>
                        <div class="kutya-doboz-hatul">
                            <h2><?= $kutya->getNev() ?></h2>
                            <div>

                                <a href="<?= "kutyaoldal.php?kutya=".str_replace(" ", "", strtolower($kutya->getNev())) ?>">Érdekel</a>
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
<?php
include_once "lablec.php";
?>
<script src="szkriptek/script.js"></script>
</body>
</html>