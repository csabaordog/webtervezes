<?php

    include_once "menusav.php";
    include_once "osztalyok/Kutya.php";
    include_once "adatkezeles.php";
    include_once "osztalyok/Felhasznalo.php";
    include_once "osztalyok/Kosar.php";
    include_once "osztalyok/TermekKosar.php";
    session_start();
    $kutyak = adatokBetoltese("adatok/kutyak.txt");

if (isset($_SESSION["felhasznalo"]) && isset($_GET["kosarba-tesz"])) {
    $felhasznalo = $_SESSION["felhasznalo"];
    $kosar = $felhasznalo->getKosar();

    $kutyaNeve = $_GET["kutya-nev"];

    foreach ($kutyak as $kutya) {
        if ($kutya->getNev() === $kutyaNeve) {
            $ujKutya = new Kosar($kutya);
            $felhasznalo->kosarbaTesz($ujKutya);
        }
    }
    felhasznaloAdatainakModositasa("adatok/felhasznalok.txt", $felhasznalo);
    header("Location: kutyak.php?siker=true");
}


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
        <?php
        if (isset($_GET["siker"])) {
            echo "<div class='siker'><p>A kutyát sikeresen a kosárba tetted!</p></div>";
        }
        ?>
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
                            <p><?= $kutya->getSzukadDB()?> db szukánk van</p>
                            <p><?= $kutya->getHimDB()?> db hímünk van</p>
                            <p><?= $kutya->getAr()?> Ft</p>
                            <div>


                                <?php if(isset($_SESSION["felhasznalo"])) {?>
                                    <form action="kutyak.php" method="GET">
                                        <input type="hidden" name="kutya-nev" value="<?php echo $kutya->getNev(); ?>">
                                        <input type="submit" class="vasarlas-gomb" name="kosarba-tesz" value="Kosárba a szukát">
                                        <input type="submit" class="vasarlas-gomb" name="kosarba-tesz" value="Kosárba a hímet">
                                    </form>
                                <?php }?>
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