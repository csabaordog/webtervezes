<?php

    include_once "menusav.php";
    include_once "osztalyok/Felhasznalo.php";
    include_once "osztalyok/Uzenet.php";
    include_once "adatkezeles.php";
    session_start();

    if (!isset($_SESSION["felhasznalo"])) {
        header("Location: bejelentkezes.php");
    }
    $uzenetek = adatokBetoltese("adatok/uzenetek.txt");


?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kutyaimádók</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">

    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("uzenofal"); ?>
<main>

    <section class="kint">
        <div class="uzenetek">
            <?php
                foreach ($uzenetek as $uzenet){
                    echo "<div class='uzenet'>{$uzenet->getSzoveg()} {$uzenet->getFelhasznalo()} {$uzenet->getLetrehozva()}</div>";
                }
            ?>
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
