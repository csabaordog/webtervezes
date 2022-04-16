<?php

include "menusav.php";
include_once "adatkezeles.php";
include_once "osztalyok/Rendelesek.php";
include_once "osztalyok/Kosar.php";
include_once "osztalyok/Felhasznalo.php";
include_once "osztalyok/TermekKosar.php";
session_start();

if (!isset($_SESSION["felhasznalo"])) {
    header("Location: bejelentkezes.php");
}


 $felhasznalo = $_SESSION["felhasznalo"];
 $kosar = $felhasznalo->getKosar();
 $vegosszeg=0;

if (isset($_GET["kosar-torol-btn"])) {
    $torlendoTermekNeve = $_GET["termek-nev"];
    $ujKosar = [];

    foreach ($kosar as $termek) {
        if ($termek->getNev() !== $torlendoTermekNeve) {
            $ujKosar[] = $termek;
        }
    }

    $felhasznalo->setKosar($ujKosar);
    felhasznaloAdatainakModositasa("adatok/felhasznalok.txt", $felhasznalo);
    header("Location: kosar.php");
}

if (isset($_GET["rendeles-btn"])) {
    $termekNevek[]="";
    foreach($kosar as $termek) {
        $termekNevek[]=$termek->getNev();
    }
    $rendel = adatokBetoltese("adatok/rendelesek.txt");
    $rendeles = new Rendelesek($felhasznalo->getFelhasznalonev(), $termekNevek);
    $rendel[] = $rendeles;
    adatokMentese("adatok/rendelesek.txt", $rendel);
    $felhasznalo->setKosar([]);
    felhasznaloAdatainakModositasa("adatok/felhasznalok.txt", $felhasznalo);
    header("Location: kosar.php?siker=true");
}


?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kutyaimádók</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/profileskosar.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">

</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
</header>
<?php navigacioGeneralasa("kosar"); ?>
<main>
    <?php if (count($kosar) > 0) { ?>
        <table id="kosar-tablazat">
            <tr>
                <th>Termék/Kutya neve</th>
                <th>Mennyiség</th>
                <th>Ár</th>
                <th>Törlés</th>
            </tr>
            <?php foreach ($kosar as $termek) { ?>
                <tr>
                    <td><?php echo $termek->getNev(); ?></td>
                    <td><?php echo $termek->getMennyiseg(); ?></td>
                    <td><?php echo $termek->getAr() . " Ft"; ?></td>
                    <?php $vegosszeg=$termek->getAr()+$vegosszeg; ?>
                    <td>
                        <form action="kosar.php" method="GET" class="kosar-torol-form">
                            <input type="hidden" name="termek-nev" value="<?php echo $termek->getNev(); ?>">
                            <input type="submit" name="kosar-torol-btn" value="Törlés">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr class="total-sum">
                <th colspan="4">Végösszeg: <?php echo $vegosszeg;?> Ft</th>
            </tr>
        </table>

        <form action="kosar.php" method="GET" class="rendeles-form">
            <input type="submit" name="rendeles-btn" value="Rendelés">
        </form>
    <?php } else { ?>
        <p class="center strong">A kosarad jelenleg üres!</p>
    <?php } ?>
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