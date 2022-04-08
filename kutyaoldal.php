<?php
//TODO GET paraméterben kap meg egy kutyát és annak az adait jeleníti meg
    session_start();
    include "menusav.php";
    include "osztalyok/Kutya.php";
    include "adatkezeles.php";

    $kutyak = adatokBetoltese("adatok/kutyak.txt");

    if(isset($_GET["kutya"])){
        foreach ($kutyak as $kutya) {
            if(str_replace(" ", "", strtolower($kutya->getNev())) === $_GET["kutya"]){
                echo $kutya->getNev();
            }
        }
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
    <link rel="stylesheet" href="stilusok/fooldal.css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("index");?>
<main>

</main>


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