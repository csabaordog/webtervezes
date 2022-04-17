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
$felhasznalok = adatokBetoltese("adatok/felhasznalok.txt");

define("DEFAULT_PROFILKEP", "adatok/profilkepek/default.jpg");

if (isset($_GET["uzenet-kuld"])) {
    $felhasznalo = $_SESSION["felhasznalo"];
    $uzenet = $_GET["uzen"];
    $ujUzenet = new Uzenet($uzenet, $felhasznalo);
    $uzenetek[] = $ujUzenet;
    adatokMentese("adatok/uzenetek.txt", $uzenetek);
}


?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Üzenőfal</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/profileskosar.css" type="text/css">
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
            <?php foreach ($uzenetek as $uzenet) { ?>
                <section>
                    <p> Üzenet dátuma: <?php echo $uzenet->getLetrehozva()->format("Y-m-d H:i:s"); ?> </p>
                    <p> Üzenő: <?php echo $uzenet->getFelhasznalo(); ?> </p>
                    <p> Üzenet: <?php echo $uzenet->getSzoveg(); ?> </p>
                </section>
            <?php } ?>
        </div>
        <form action="uzenofal.php" method="GET">
            <label for="uzenet">Mit üzensz másoknak? (max. 300 karaktert írhatsz!)</label>
            <input type="text" name="uzen" id="uzenet" maxlength="300">
            <input type="submit" name="uzenet-kuld" id="uzenet-kuld" value="Üzenet elküldése">
        </form>
    </section>
    <section class="felhasznalok">
        <h3>További felhasználók:</h3>
        <div>
            <?php foreach ($felhasznalok as $felhasznalo) {
                $profilkep = DEFAULT_PROFILKEP;
                $utvonal = "adatok/profilkepek/" . $felhasznalo->getFelhasznalonev();
                $engedelyezettKiterjesztesek = ["png", "jpg"];
                foreach ($engedelyezettKiterjesztesek as $kit) {
                    if (file_exists("$utvonal.$kit")) {
                        $profilkep = "$utvonal.$kit";
                    }
                }
                ?>
                <section class="felhasznalo">
                    <h4><?php echo $felhasznalo->getFelhasznalonev(); ?> </h4>
                    <img src="<?php echo $profilkep ?>" alt="<?php echo $felhasznalo->getFelhasznalonev(); ?>-profilkep" width="130" height="130">
                    <p>Születési év: <?php echo $felhasznalo->getSzuletesiEv(); ?> </p>
                    <p>Nem: <?php echo $felhasznalo->getNem(); ?> </p>
                </section>
            <?php } ?>
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
