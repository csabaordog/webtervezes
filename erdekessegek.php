<?php
    session_start();
    include "menusav.php";
    include_once "osztalyok/Felhasznalo.php"
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Érdekességek</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/erdekessegek.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("erdekessegek"); ?>
<main>
    <section class="kint">
        <h3>10 dolog, amit tudnod kell a kutyákról:</h3>


        <ol>
            <li>A kutya <strong>NEM EMBER!</strong> A kutyát nem szabad emberként kezelni, mert ez súlyos viselkedési
                zavarokhoz vezet. Aki gyermekeként, testvéreként tekint kutyájára, olyan súlyos zavart okoz neki, hogy a
                kutya állandó stresszben éli az életét.
            </li>
            <li>Minden kutya egyedi, ezért nincs értelme másik kutyához hasonlítani. Ami egyik kutyánál működik, az nem
                biztos, hogy fog a másik kutyánál. Minden kutya egyéniség, és ennek megfelelően kell vele bánni.
            </li>
            <li>A kutya nevelését akkor kell elkezdeni, amikor hozzánk kerül, legyen szó kölyökről vagy felnőttről. Nem
                lehet kifogás az, hogy túl kicsi, vagy örökbe fogadott kutyánál az, hogy szegénynek össze van törve a
                lelke.
            </li>
            <li>A kutyáknak szabályokat kell felállítani, hogy megelőzhetőek legyenek a viselkedési problémák. A kutyák
                nem születtek szabadnak, szükségük van az ember irányítására, mert különben fogalmuk sincs arról, hogy
                mi a jó.
            </li>
            <li>A kutyáktól csak olyan dolgokat várhatunk el, amit megtanítottunk neki. A kutyák nem programozható
                robotok, hanem érző lények. Ha megértik mit várunk el tőlük, akkor szívesen megteszik.
            </li>
            <li>A kutya tanításánál a fokozatosság, a következetesség, a folyamatos gyakorlás és a pozitív megerősítés a
                legfontosabb. Csak így érhető el tartós eredmény.
            </li>
            <li>A kutyákat meg kell tanítani a tiltásra. A tiltás szabályai a következettség, a humánusság, és a pozitív
                megerősítés elmaradása (tehát ha valami nem kívánatosat tesz, akkor nem kap jutalmat vagy dicséretet).
                Nagyon fontos, hogy ha valamit megtiltunk a kutyának, attól nem fog „összetörni a lelke”.
            </li>
            <li>A kutyák egyéniségének és fajtájának megfelelő tanulási és mozgási lehetőséget kell biztosítani.
                Legfontosabbak: séta, szocializáció, játék kutyákkal, játék a gazdival, alapengedelmesség elsajátítása,
                keresőjátékok, akadálypálya, stb. Ha a kutya megfelelően kiéli ösztöneit, akkor nem lesz viselkedési
                problémája. Pl. munkakutyákat nem csak fizikailag, hanem szellemileg is le kell fárasztani.
            </li>
            <li>Sok „hozzáértő” ember van, aki jó tanácsokkal látja el a gazdikat. Ha bármi kérdés adódna, ne a
                szomszédot, vagy barátot kérdezd meg, hanem fordulj szakemberhez. Nagyon sokat árthatnak a hozzá nem
                értők „jó tanácsai”!
            </li>
            <li>Engedd a kutyádnak, hogy <strong>KUTYA LEGYEN</strong>, és ezért tegyél meg mindent!</li>
        </ol>
        <img src="media/kepek/asit.jpg" alt="Asito kutya" id="img-asito-kutya">
    </section>
    <section class="kint">
        <h3>Donka dal:</h3>
        <p>És most ez a sok információ után kapcsolódjunk ki a Donka dallal még mielőtt rátérnénk egy komolyabb
            témára.</p>
        <audio controls id="zene">
            <source src="media/hangfajlok/DonkaDal.mp3" type="audio/mpeg">
            A böngésző nem támogatja a hangfájlt.
        </audio>
    </section>
    <section class="kint">
        <h3>Amit jó, ha tudsz:</h3>
        <table id="mergek-tablazat">
            <caption>Közismert mérgek és tüneteik</caption>
            <tr>
                <th id="mereg">Közismert méreg</th>
                <th id="tunet">Tünet</th>
            </tr>
            <tr>
                <td headers="mereg">A patkánymérgek veszélyesek, ha nagy mennyiségben kerülnek a szervezetbe.
                    Mesterségesen színetettek, hogy hatóanyaguk felismerhető legyen, ezért a mintát - vigyük el az
                    állatorvoshoz a diagnózis meggyorsítása végett
                </td>
                <td headers="tunet">Pontszerű vérzések az ínyben és véralvadási zavarok</td>
            </tr>
            <tr>
                <td headers="mereg">Háztartásban előforduló gyógyszerek: aszpirin, nyugtatók vagy barbiturátok</td>
                <td headers="tunet">Étvágytalanság, depresszíó, tántorgás és kóma</td>
            </tr>
            <tr>
                <td headers="mereg">Csigaméreg (metaldehid)</td>
                <td headers="tunet">Remegés, nyáladzás, idegrendszeri rohamok és kóma</td>
            </tr>
            <tr>
                <td headers="mereg">Fagyálló (etilén-glikol)</td>
                <td headers="tunet">Hányás, tántorgás, görcs és kóma</td>
            </tr>
            <tr>
                <td headers="mereg">Ólomtartalmú festék</td>
                <td headers="mereg">Hányás, hasmenés, hasfájás és bénulás</td>
            </tr>
            <tr>
                <td headers="mereg">Háztartási tisztítószerek</td>
                <td headers="tunet">Gyulladt bőr, hányás, hasmenés, fekélyesedett nyelv és görcs</td>
            </tr>
            <tr>
                <td headers="mereg">Békák: a kutyák nyalogathatják a békákat, amiknek mérgező lehet a bőrváladéka</td>
                <td headers="tunet">Betagadt száj és nyelv, vörösség</td>
            </tr>
        </table>
        <div id="ugras-gomb" title="Oldal tetejere ugrik" class="hidden">
            <p>/\<br>|</p>
        </div>
    </section>
</main>

<?php
include_once "lablec.php";
?>

<script src="szkriptek/script.js"></script>
</body>
</html>