<?php

include "menusav.php";
include_once "osztalyok/Kosar.php";
include_once "osztalyok/Felhasznalo.php";
session_start();
//TODO kilistázni a felhasználó kosarát "szépen"
//ha nincs bejelentkezve, akkor atiranyitjuk
if (!isset($_SESSION["felhasznalo"])) {
    header("Location: bejelentkezes.php");
}


 $felhasznalo = $_SESSION["felhasznalo"];
 $kosar = $felhasznalo->getKosar();

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
</header>
<?php navigacioGeneralasa("kosar"); ?>
<main>
    <?php if (count($kosar) > 0) { ?>
        <table id="cart-table">
            <tr>
                <th>Pizza neve</th>
                <th>Mennyiség</th>
                <th>Ár</th>
                <th>Törlés</th>
            </tr>
            <?php foreach ($kosar as $item) { ?>
                <tr>
                    <td><?php echo $item->getNev(); ?></td>
                    <td><?php echo $item->getMennyiseg(); ?></td>
                    <td><?php echo $item->getAr() . " Ft"; ?></td>
                    <td>
                        <form action="kosar.php" method="GET" class="cart-delete-form">
                            <input type="hidden" name="item-name" value="<?php echo $item->getNev(); ?>">
                            <input type="submit" name="delete-from-cart-btn" value="Törlés">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr class="total-sum">
                <th colspan="4">Végösszeg:  Ft</th>
            </tr>
        </table>

        <form action="kosar.php" method="GET" class="order-form">
            <input type="submit" name="order-btn" value="Rendelés">
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