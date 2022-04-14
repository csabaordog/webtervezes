<?php
    session_start();
    include "menusav.php";
    include_once "osztalyok/Felhasznalo.php";
if (!isset($_SESSION["felhasznalo"])) {
    header("Location: bejelentkezes.php");
}
    //TODO űrlap amin a felhasználó tudja módosítani az adatait
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beállítások</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">

</head>
<body>
<header>
    <h1>Beállítások</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("beallitasok"); ?>
<main>
    <section class="kint">
        <h3>Ez csak placeholder, később beállítások kerülnek majd ide. (pl. jelszó- felhasználónév módosítás)</h3>

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