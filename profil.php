<?php
    include_once "osztalyok/Felhasznalo.php";
    include_once "adatkezeles.php";
    include_once "fuggvenyek.php";
    session_start();

    // Ha a felhasználó nincs bejelentkezve, akkor átirányítjuk a bejelentkezés oldalra.

    if (!isset($_SESSION["felhasznalo"])) {
        header("Location: login.php");
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

    // Egy tömb, amelyben a profilkép módosítása során adódó esetleges hibákat fogjuk tárolni.
    $hibak = [];

    // A módosított profilkép feldolgozása.

if (isset($_POST["upload-btn"]) && is_uploaded_file($_FILES["profile-picture"]["tmp_name"])) {
        // A fuggvenyek.php-ban lévő profilepFeltoltese() függvénnyel ellenőrzött módon töltjük fel az új profilképet.
        profilkepFeltoltese($hibak, $_SESSION["felhasznalo"]->getFelhasznalonev());

        // Ha a fájl sikeresen fel lett töltve, akkor meg kell győződnünk arról, hogy a régi profilkép törölve lett.

        if (count($hibak) === 0) {
            // Lekérdezzük az elmentett, új profilkép elérési útonalát az $utvonal változóba.

            $kit = strtolower(pathinfo($_FILES["profile-picture"]["name"], PATHINFO_EXTENSION));
            $utvonal = "adatok/profilkepek/" . $_SESSION["felhasznalo"]->getFelhasznalonev() . "." . $kit;

            // Ha az új profilkép kiterjesztése ugyanaz, mint a régi profilképé, akkor rendben vagyunk, az új kép
            // ugyanolyan néven lett feltöltve, mint a régi, ezáltal a régi fájlt felülírtuk. Egyéb esetben, ha a régi
            // és az új fájlnév eltér, akkor a régi profilképet ($profilkep változó) töröljük. Fontos ellenőrizni, hogy
            // az alapértelmezett profilképet (DEFAULT_PROFILKEP) ne töröljük!

            if ($utvonal !== $profilkep && $profilkep !== DEFAULT_PROFILKEP) {
                unlink($profilkep);     // A $profilkep elérési útvonalon található fájl törlése.
            }

            // Az oldal újratöltése.
            header("Location: profil.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Profilom</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/ikon.jpg">
    <link rel="stylesheet" href="stilusok/stilusok.css">
</head>
<body>
    <?php
        navigacioGeneralasa("profil");

        // A bejelentkezett felhasználó (tulajdonképpen egy Felhasznalo objektum).
        $felhasznalo = $_SESSION["felhasznalo"];
    ?>

    <main>
        <h1 class="center">Profilom</h1>

        <?php
            if (count($hibak) > 0) {
                echo "<div class='errors'>";

                foreach ($hibak as $hiba) {
                    echo "<p>" . $hiba . "</p>";
                }

                echo "</div>";
            }
        ?>

        <table id="profile-table">
            <tr>
                <th colspan="2">Felhasználói adatok</th>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="200">

                    <form action="profil.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile-picture">
                        <input type="submit" name="upload-btn" value="Profilkép módosítása">
                    </form>
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

        <form action="kijelentkezes.php" method="POST" class="logout-form">
            <input type="submit" name="logout-btn" value="Kijelentkezés">
        </form>
    </main>

    <?php
        include_once "lablec.php";
    ?>
</body>
</html>