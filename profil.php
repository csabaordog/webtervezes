<?php
    include "menusav.php";

    include_once "osztalyok/Felhasznalo.php";
    include_once "adatkezeles.php";
    include_once "fuggvenyek.php";
    session_start();


    if (!isset($_SESSION["felhasznalo"])) {
        header("Location: bejelentkezes.php");
    }
    // Ha a felhasználónak nincs profilképe, akkor alapértelmezés szerint a default.png-t jelenítjük meg a kép helyén.

    define("DEFAULT_PROFILKEP", "adatok/profilkepek/default.jpg");
    $profilkep = DEFAULT_PROFILKEP;

// Megnézzük, hogy van-e a felhasználó nevével PNG és JPG kiterjesztésű profilkép az assets/img/profile-pictures
    // elérési útvonalon. Ha igen, akkor frissítjük ennek megfelelően a $profilkep változó értékét.

    $utvonal = "adatok/profilkepek/" . $_SESSION["felhasznalo"]->getFelhasznalonev();
    $engedelyezettKiterjesztesek = ["png", "jpg"];

foreach ($engedelyezettKiterjesztesek as $kit) {
        if (file_exists("$utvonal.$kit")) {
            $profilkep = "$utvonal.$kit";
        }
    }
$felhasznalo = $_SESSION["felhasznalo"];


?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Profilom</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/ikon.jpg">
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/profileskosar.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css">
</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
    <h2>Profil</h2>
</header>
    <?php
        navigacioGeneralasa("profil");
        ?>

    <main>
        <section>
            <h1 class="center">Profilom</h1>

            <table id="profile-table">
                <tr>
                    <th colspan="2">Felhasználói adatok</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="200">

                    </td>
                </tr>
                <tr>
                    <th>Felhasználónév</th>
                    <td><?php echo $felhasznalo->getFelhasznalonev(); ?></td>
                </tr>
                <tr>
                    <th>E-mail cím</th>
                    <td><?php echo $felhasznalo->getEmail(); ?></td>
                </tr>
                <tr>
                    <th>Születési év</th>
                    <td><?php echo $felhasznalo->getSzuletesiEv(); ?></td>
                </tr>
                <tr>
                    <th>Nem</th>
                    <td><?php echo $felhasznalo->getNem(); ?></td>
                </tr>
            </table>
            <a href="beallitasok.php">
                <button>Beállítások</button>
            </a>

            <form action="kijelentkezes.php" method="POST" class="logout-form">
                <input type="submit" name="logout-btn" value="Kijelentkezés">
            </form>

        </section>
    </main>

    <?php
        include_once "lablec.php";
    ?>
<script src="szkriptek/script.js"></script>

</body>
</html>