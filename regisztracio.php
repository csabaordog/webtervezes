<?php
    //Regisztráció kezelése
    include "menusav.php";
    include "osztalyok/Felhasznalo.php";
    include "adatkezeles.php";
    include "fuggvenyek.php";
    session_start();

    $felhasznalok = adatokBetoltese("adatok/felhasznalok.txt");
    $hibak = [];

    //Regisztráció kezelése
    if(isset($_POST["signup-btn"])){
        //Űrlapadatok mentése
        $felhasznalonev = $_POST["uname"];
        $jelszo = $_POST["password"];
        $ellenorzoJelszo = $_POST["password2"];
        $email = $_POST["mail"];
        $szuletesiEv = $_POST["birthd"];
        $jelolonegyzetek = $_POST["confirmations"];
        $nem = "egyéb";

        if (isset($_POST["gender"])) {
            $nem = $_POST["gender"];
        }

        if (trim($felhasznalonev) === "" || trim($jelszo) === "" || trim($ellenorzoJelszo) === "" ||
            trim($email) === "" || trim($szuletesiEv) === "") {
            $hibak[] = "Minden kötelezően kitöltendő mezőt ki kell tölteni!";
        }

        if (strlen($jelszo) < 5) {
            $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";
        }

        //Jelszó validálás
        if (!(preg_match("/[A-Za-z]/", $jelszo) && preg_match("/[0-9]/", $jelszo))) {
            $hibak[] = "A jelszónak tartalmaznia kell betűt és számjegyet is!";
        }
        //Email cím validálás
        if (!preg_match("/[0-9a-z\.\-]+@([0-9a-z\-]+\.)[a-z]{2,4}/", $email)) {
            $hibak[] = "A megadott e-mail cím formátuma nem megfelelő!";
        }
        //Jelszavak egyezésének ellenőrzése
        if($jelszo !== $ellenorzoJelszo){
            $hibak[] = "A megadott jelszavak nem egyeznek!";
        }
        //Email cím ellenőrzése
        foreach ($felhasznalok as $felhasznalo){
            if($felhasznalo->getEmail() === $email){
                $hibak[] = "Az email cím foglalt!";
            }
            if ($felhasznalo->getFelhasznalonev() === $felhasznalonev) {
                $hibak[] = "A felhasználónév már foglalt!";
            }
        }
        if ($felhasznalonev === "default") {
            $hibak[] = "A felhasználónév már foglalt!";
        }
        //Felhasználási feltételek elfogadásának ellenőrzése
        if(!in_array("accept-terms-and-conditions",$jelolonegyzetek)){
            $hibak[] = "Nem fogadta el a felhasználási feltételeket!";
        }
        //Adatok helyességére vonatkozó nyilatkozat ellenőrzése
        if(!in_array("confirm-data", $jelolonegyzetek)){
            $hibak[] = "Nem fogadta el az adatok helyességére vonatkozó nyilatkozatot!";
        }
        profilkepFeltoltese($hibak, $felhasznalonev);

        //Ha nincs hiba, akkor mentés az adatbázisba
        if(count($hibak) === 0){
            try {
                $ujFelhasznalo = new Felhasznalo($felhasznalonev,password_hash($jelszo,PASSWORD_DEFAULT),$email,$szuletesiEv,$nem);
                $felhasznalok[] = $ujFelhasznalo;
                adatokMentese("adatok/felhasznalok.txt", $felhasznalok);
                header("Location: regisztracio.php?siker=true");
            }
            catch (Exception $e){
                echo "Hiba lépett fel";
            }
        }

    }

?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/regisztracio.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">
</head>
<body>
<header>
    <h1>Kutya birodalom</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("regisztracio"); ?>
<main>
    <section class="kint">
        <h3>Regisztráció</h3>
        <?php
        if (isset($_GET["siker"])) {
            echo "<div class='siker'>Sikeres regisztráció!</div>";
        }
        //Ha hiba lépett fel a regisztráció során
        if (count($hibak) > 0) {
            echo "<div class='hibak'>";

            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }

            echo "</div>";
        }
        ?>
        <div class="registration">
            <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
                <fieldset>
                    <legend>Személyes adatok:</legend>
                    <label for="usname">Felhasználónév (Kötelező):</label>
                    <input type="text" name="uname" id="usname" maxlength="20" placeholder="kutyaimado12" required
                           class="form-input"  <?php if (isset($_POST["uname"])) echo "value='" . $_POST["uname"] . "'" ?>>

                    <label for="pswd">Jelszó (Kötelező):</label>
                    <input type="password" name="password" id="pswd" maxlength="25" required class="form-input">

                    <label for="pswd2">Jelszó ismét (Kötelező):</label>
                    <input type="password" name="password2" id="pswd2" maxlength="25" required class="form-input">

                    <label for="email">E-mail cím (Kötelező):</label>
                    <input type="email" name="mail" id="email" placeholder="valaki@gmail.com" required
                           class="form-input" <?php if (isset($_POST["mail"])) echo "value='" . $_POST["mail"] . "'" ?>>

                    <label for="birth">Születési év (Kötelező):</label>
                    <input type="number" name="birthd" id="birth" min="1922" max="2013" placeholder="1977" required
                           class="form-input" <?php if (isset($_POST["birthd"])) echo "value='" . $_POST["birthd"] . "'" ?>>

                    <label for="avatar">Profilkép: </label>
                    <input type="file" name="profilkep" id="avatar" accept="image/*" class="form-input">
                    <div class="radio">
                        <p>Nem:</p>
                        <label><input type="radio" name="gender" value="férfi"
                                <?php if (isset($_POST["gender"]) && $_POST["gender"] === "férfi") echo "checked"; ?>> Férfi</label>
                        <label><input type="radio" name="gender" value="nő"
                                <?php if (isset($_POST["gender"]) && $_POST["gender"] === "nő") echo "checked"; ?>> Nő</label>
                        <label><input type="radio" name="gender" value="egyéb"
                                <?php if (!isset($_POST["gender"]) || $_POST["gender"] === "egyéb") echo "checked"; ?>> Egyéb</label>
                    </div>

                </fieldset>
                <fieldset>
                    <legend>Egyéb:</legend>
                    <label for="care">Naponta mennyi időt szánsz a kutyádra?</label>
                    <select name="care0" id="care" class="form-input">
                        <option value="very-little">Naponta pár percet.</option>
                        <option value="little">Naponta fél órát.</option>
                        <option value="moderate">Naponta 1-2 órát.</option>
                        <option value="average">Naponta 3-4 órát.</option>
                        <option value="lot">Naponta 5-6 órát.</option>
                        <option value="very-much">Naponta több, mint 6 órát.</option>
                    </select>


                    <label for="love">Miért szereted a kutyákat? (max. 300 karakter): </label>
                    <textarea name="introduction" id="love" maxlength="300" rows="3" class="form-input"></textarea>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="confirmations[]" value="confirm-data" required>
                            Nyilatkozom, hogy a megadott adatok a valóságnak megfelelnek.
                        </label>
                        <label>
                            <input type="checkbox" name="confirmations[]" value="accept-terms-and-conditions" required>
                            Elfogadom a <a href="feltetelek.php">felhasználási feltételeket. </a>
                        </label>
                        <label>
                            <input type="checkbox" name="checkbox3" value="sub-to-newsletter" checked>
                            Feliratkozom a weboldallal kapcsolatos hírlevelekre.
                        </label>
                    </div>


                </fieldset>
                <input type="reset" name="reset-btn" value="Visszaállítás" class="gomb form-input">
                <input type="submit" name="signup-btn" value="Regisztráció" class="gomb form-input">
            </form>
        </div>
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