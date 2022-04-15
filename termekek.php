<?php

    include_once "menusav.php";
    include_once "osztalyok/Termek.php";
    include_once "adatkezeles.php";
    include_once "osztalyok/Felhasznalo.php";
    include_once "osztalyok/Kosar.php";
    include_once "osztalyok/TermekKosar.php";
    session_start();
    $termekek = adatokBetoltese("adatok/termekek.txt");

if (isset($_SESSION["felhasznalo"]) && isset($_GET["kosarba-tesz"])) {
    $felhasznalo = $_SESSION["felhasznalo"];
    $kosar = $felhasznalo->getKosar();

    $termekNeve = $_GET["termek-nev"];

    foreach ($termekek as $termek) {
        if ($termek->getNev() === $termekNeve) {
            $ujTermek = new TermekKosar($termek);
            $felhasznalo->kosarbaTeszTermek($ujTermek);
        }
    }
    felhasznaloAdatainakModositasa("adatok/felhasznalok.txt", $felhasznalo);
    header("Location: termekek.php?siker=true");
}

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
        <?php
        if (isset($_GET["siker"])) {
            echo "<div class='siker'><p>A terméket sikeresen a kosárba tetted!</p></div>";
        }
        ?>
        <div class="grid-container">
            <?php foreach ($termekek as $termek) : ?>
                <div class="termek-doboz">
                    <img src="<?= "media/kepek/{$termek->getKep()}" ?>" alt="<?= $termek->getNev() ?>" title="<?= $termek->getNev() ?>" class="termek-kep">
                    <p><?= $termek->getNev() ?></p>
                    <p><?= $termek->getAr() ?> Ft</p>
                    <?php if(isset($_SESSION["felhasznalo"])) {?>
                        <form action="termekek.php" method="GET">
                            <input type="hidden" name="termek-nev" value="<?php echo $termek->getNev(); ?>">
                            <input type="submit" name="kosarba-tesz" value="Kosárba">
                        </form>
                    <?php }?>
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