<?php
    include_once "menusav.php";
    include_once "osztalyok/Termek.php";
    include_once "adatkezeles.php";
    include_once "osztalyok/Felhasznalo.php";
    include_once "osztalyok/Kosar.php";
    include_once "osztalyok/Rendelesek.php";
    include_once "osztalyok/TermekKosar.php";
    session_start();

    if ($_SESSION["felhasznalo"]->getFelhasznalonev() !== "admin") {
        header("Location: index.php");
    }

    if (!isset($_SESSION["felhasznalo"])) {
        header("Location: bejelentkezes.php");
    }

    $rendelesek = adatokBetoltese("adatok/rendelesek.txt");
    $teljesitettRendelesek = [];
    $teljesitetlenRendelesek = [];

    foreach ($rendelesek as $rendeles) {
        if ($rendeles->isTeljesitett()) {
            $teljesitettRendelesek[] = $rendeles;
        } else {
            $teljesitetlenRendelesek[] = $rendeles;
        }
    }

    if (isset($_GET["rendeles-btn"])) {
        $megrendelo = $_GET["megrendelo"];
        $rendelesDatuma = $_GET["rendeles-datum"];
        foreach ($rendelesek as $rendeles) {
            if ($rendeles->getMegrendelo() === $megrendelo && $rendeles->getRendelesDatuma()->format("Y-m-d H:i:s") === $rendelesDatuma) {
                $rendeles->setTeljesitett(true);
            }
        }

        adatokMentese("adatok/rendelesek.txt", $rendelesek);
        header("Location: rendelesek.php");
    }

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rendelések</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/termekekeskutyak.css">
    <link rel="stylesheet" href="stilusok/termekek.css">
    <link rel="stylesheet" href="stilusok/profileskosar.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Rendelések</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("rendelesek"); ?>
<main>
    <section class="kint">
        <?php if (count($rendelesek) > 0) { ?>
            <?php if (count($teljesitetlenRendelesek) > 0) { ?>
                <h2 class="center">Aktív (nem teljesített) rendelések</h2>
                <table>
                    <tr>
                        <th>Megrendelő</th>
                        <th>Rendelés dátuma</th>
                        <th>Rendelés tartalma</th>
                        <th></th>
                    </tr>
                    <?php foreach ($teljesitetlenRendelesek as $rendeles) { ?>
                        <tr>
                            <td><?php echo $rendeles->getMegrendelo(); ?></td>
                            <td><?php echo $rendeles->getRendelesDatuma()->format("Y-m-d H:i:s"); ?></td>
                            <td><?php echo implode("<br>", $rendeles->getRendelesTartalma()); ?></td>
                            <td>
                                <form action="rendelesek.php" method="GET" class="rendeles-form">
                                    <input type="hidden" name="megrendelo" value="<?php echo $rendeles->getMegrendelo(); ?>">
                                    <input type="hidden" name="rendeles-datum" value="<?php echo $rendeles->getRendelesDatuma()->format('Y-m-d H:i:s'); ?>">
                                    <input type="submit" name="rendeles-btn" value="Teljesítés">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
            <?php if (count($teljesitettRendelesek) > 0) { ?>
                <hr>
                <h2 class="center">Teljesített rendelések</h2>
                <table>
                    <tr>
                        <th>Megrendelő</th>
                        <th>Rendelés dátuma</th>
                        <th>Rendelés tartalma</th>
                    </tr>
                    <?php foreach ($teljesitettRendelesek as $rendeles) { ?>
                        <tr>
                            <td><?php echo $rendeles->getMegrendelo(); ?></td>
                            <td><?php echo $rendeles->getRendelesDatuma()->format("Y-m-d H:i:s"); ?></td>
                            <td><?php echo implode("<br>", $rendeles->getRendelesTartalma()); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        <?php } else { ?>
            <p class="center strong">Még nem érkezett rendelés!</p>
        <?php } ?>
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