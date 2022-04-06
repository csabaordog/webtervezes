<?php
    session_start();
    include "menusav.php";
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
<?php navigacioGeneralasa("kapcsolat"); ?>
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

<?php
include_once "lablec.php";
?>
<script src="szkriptek/script.js"></script>
<script src="szkriptek/kapcsolat.js"></script>

<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwTZaENTajDpz70qNjUpQzkCmxMzBOKds&callback=initMap&v=weekly"
        async
></script>


</body>


</html>