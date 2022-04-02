<?php
session_start();
//Ha a felhasználó nincs bejelentkezve, akkor át kéne átirányítani a főoldalra
//Először a felhasználókezelés a fontos, utána lehet ezzel foglalkozni.
include "menusav.php";
include "lablec.php";
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kutyaimádok</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">

</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
</header>
<?php //megjelenitMenu("kosar") ?>
<main>
    A kosarad üres!!!
    <div id="ugras-gomb" title="Oldal tetejere ugrik" class="hidden">
        <p>/\<br>|</p>
    </div>
</main>

<?php megjelenitLablec();?>
<script src="szkriptek/script.js"></script>

</body>

</html>