<?php
    session_start();
    include "menusav.php";
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
<?php navigacioGeneralasa("termekek"); ?>
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