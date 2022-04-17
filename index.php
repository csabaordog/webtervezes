<?php

    include_once "menusav.php";
    include_once "osztalyok/Felhasznalo.php";
    session_start();
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kutyaimádók</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/fooldal.css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("index"); ?>
<main>

    <section class="kint">
        <h3 id="rolunk">Kutyákról és üzletünkről</h3>
        <div id="kepsorozat-doboz"></div>
        <p>
            <q>Egy kutya tíz évvel meghosszabbíthatja az életünket.
                A szeretet, a gyengédség, a törődés és a baráti kapcsolat,
                amit egy kutya jelent, mérsékli a stressz negatív hatásait.</q><br>
            David R. Hawkins
        </p>
        <h3>A kutyákról általában:</h3>
        <p>A kutyák a farkasoktól származnak (génállományuk 99%-a azonos), és mint a kutyafélék általában, ők is
            falkaállatok
            - ebből adódóan rendkívül sokrétű kommunikációs eszköztárral rendelkeznek és hierarchikus felépítés jellemzi
            társadalmukat.
            Minden falkában kialakul egy rangsor, melynek élén a falkavezér áll.
            Ez a fajta társadalmi felépítés a kulcsa egy falka fennmaradásának és biztonságos létezésének.
            A háziasított kutyák esetében a falkát az emberi család alkotja, beleértve az egyéb háziállatokat is (pl.
            macska).
            Ahhoz, hogy a kutya kiegyensúlyozott legyen, biztonságban érezze magát,
            és így harmonikus kapcsolatban tudjon élni gazdáival és más fajokkal, szüksége van egy falkavezérre,
            és tisztában kell lennie a falkában betöltött pozíciójával és szerepével.</p>

        <ul>
            <li><i class="fas fa-paw"></i> Energia útján (minden kutya más energiaszinttel rendelkezik és leggyakrabban
                ez alapján határozzák meg egymás között a rangsort)
            </li>
            <li><i class="fas fa-paw"></i> Hangok útján (ugatás, vonyítás stb)</li>
            <li><i class="fas fa-paw"></i> Kémiai úton (pl. jelölés során a vizeletükkel feromonokkal teli
                illatanyagokat hagynak hátra, melyek rengeteg információval szolgálnak a többi kutya számára)
            </li>
            <li><i class="fas fa-paw"></i> Vizuálisan (pl. különböző testtartások, szemkontaktus stb.)</li>
            <li><i class="fas fa-paw"></i> Tapintással (pl. harapás)</li>
        </ul>
        <p id="clear-float"></p>
    </section>
    <section class="kint">
        <h3>Hogy miért vegyél kutyát?</h3>
        <ul>
            <li><i class="fas fa-paw"></i> Kimozdít otthonodból</li>
            <li><i class="fas fa-paw"></i> Javítja a mentális egészséget</li>
            <li><i class="fas fa-paw"></i> Megérzi, ha baj van</li>
            <li><i class="fas fa-paw"></i> Kutyával könnyebb ismerkedni</li>
            <li><i class="fas fa-paw"></i> Megvéd a veszélytől</li>
            <li><i class="fas fa-paw"></i> Csodálatos társaságot nyújt idős korban is</li>
            <li><i class="fas fa-paw"></i> Összetartja a családot</li>
            <li><i class="fas fa-paw"></i> A kutya mellett felnőni igazi ajándék</li>
        </ul>
        <p>De ha mi nem is tudunk meggyőzni arról, hogy vegyél egyet vagy akár többet, akkor a következő videó biztosan
            segít majd ebben,
            mert ha meglátod ezt az aranyos kutyát, ahogyan elhelyezkedik a fűben, akkor te is akarni fogsz egy ilyen
            hasonló cukiságot.</p>
        <video controls id="video">
            <source src="media/videok/Kenyelem.mp4">
            A böngésző nem támogatja a videófájlt.
        </video>
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