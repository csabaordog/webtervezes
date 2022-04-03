<?php
    session_start();
    //Regisztráció kezelése

    include "Adatbaziskezelo.php";
    $db = new AdatbazisKezelo();
    $hibak = [];
    $felhasznaloMentve = false;
    //Regisztráció kezelése
    if(isset($_POST["signup-btn"])){
        //Űrlapadatok mentése
        $felhasznalonev = $_POST["uname"];
        $jelszo = $_POST["password"];
        $ellenorzoJelszo = $_POST["password2"];
        $email = $_POST["email"];
        $szuletesiEv = $_POST["birthd"];
        $jelolonegyzetek = $_POST["confirmations"];
        $nem = "egyéb";

        if (isset($_POST["gender"])) {
            $nem = $_POST["gender"];
        }
        //Jelszó validálás
        if (!(preg_match("/[A-Za-z]/", $jelszo) || preg_match("/[0-9]/", $jelszo))) {
            $hibak[] = "A jelszónak tartalmaznia kell betűt és számjegyet is!";
        }
        //Email cím validálás
        if (!preg_match("/[0-9a-z\.\-]+@([0-9a-z\-]+\.)[a-z]{2,4}/", $email)) {
            $hibak[] = "A megadott e-mail cím formátuma nem megfelelő!";
        }
        //Jelszavak egyezésének ellenőrzése
        if($jelszo != $ellenorzoJelszo){
            $hibak[] = "A megadott jelszavak nem egyeznek!";
        }
        //Email cím ellenőrzése
        $felhasznalok = $db->tablaLekerdezAdatbazisbol("felhasznalok");
        foreach ($felhasznalok as $felhasznalo){
            if($felhasznalo["email"] == $email){
                $hibak[] = "Az email cím foglalt!";
                break;
            }
        }
        //Felhasználási feltételek elfogadásának ellenőrzése
        if(!in_array("accept-terms-and-conditions",$jelolonegyzetek)){
            $hibak[] = "Nem fogadta el a felhasználási feltételeket!";
        }
        //Adatok helyességére vonatkozó nyilatkozat ellenőrzése
        if(!in_array("confirm-data", $jelolonegyzetek)){
            $hibak[] = "Nem fogadta el az adatok helyességére vonatkozó nyilatkozatot!";
        }
        //Ha nincs hiba, akkor mentés az adatbázisba
        if(count($hibak) == 0){
            try {
                $db->beszurFelhasznalo($felhasznalonev, $jelszo, $email, $nem);
                $felhasznaloMentve = true;
            }
            catch (Exception $e){
                echo "Hiba lépett fel";
            }
        }

    }
    //TODO egyéb mezők hozzáadása regisztrációnál
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
<nav id="menu">
    <div id="menu-logo">Regisztráció</div>
    <input id="menu-toggle" type="checkbox"/>
    <div class="hamburger-gomb-container" onclick="hamburger()">
        <div class="hamburger-gomb"></div>
    </div>
    <div id="menu-bg"></div>
    <div id="menu-pontok">
        <a href="index.php" class="menu-link">
            <div class="menu-link-tartalom">Főoldal</div>
        </a>
        <a href="kutyak.php" class="menu-link">
            <div class="menu-link-tartalom">Kutyák</div>
        </a>
        <a href="termekek.php" class="menu-link">
            <div class="menu-link-tartalom">Termékek</div>
        </a>
        <a href="erdekessegek.php" class="menu-link">
            <div class="menu-link-tartalom">Érdekességek</div>
        </a>
        <a href="kapcsolat.php" class="menu-link">
            <div class="menu-link-tartalom">Kapcsolat</div>
        </a>
        <a href="beallitasok.php" class="menu-link">
            <div class="menu-link-tartalom">Beállítások</div>
        </a>
        <a href="bejelentkezes.php" class="menu-link">
            <div class="menu-link-tartalom">Bejelentkezés</div>
        </a>
        <a href="#" class="menu-link">
            <div class="menu-link-tartalom">Regisztráció</div>
        </a>
    </div>
</nav>
<main>
    <section class="kint">
        <h3>Regisztráció</h3>
        <?php
        //Ha sikerült elmenteni a felhasználót
        if ($felhasznaloMentve){
            echo "<div class='uzenet'> A felhasználó mentése sikeres volt! </div>";
        }
        //Ha hiba lépett fel a regisztráció során
        else if (count($hibak) > 0) {
            echo "<div class='hibak'>";

            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }

            echo "</div>";
        }
        ?>
        <div class="registration">
            <form action="#" method="POST" autocomplete="off">
                <fieldset>
                    <legend>Személyes adatok:</legend>
                    <label for="usname">Felhasználónév (Kötelező):</label>
                    <input type="text" name="uname" id="usname" maxlength="20" placeholder="kutyaimado12" required
                           class="form-input">

                    <label for="pswd">Jelszó (Kötelező):</label>
                    <input type="password" name="password" id="pswd" maxlength="25" required class="form-input">

                    <label for="pswd2">Jelszó ismét (Kötelező):</label>
                    <input type="password" name="password" id="pswd2" maxlength="25" required class="form-input">

                    <label for="email">E-mail cím (Kötelező):</label>
                    <input type="email" name="mail" id="email" placeholder="valaki@gmail.com" required
                           class="form-input">

                    <label for="birth">Születési év (Kötelező):</label>
                    <input type="number" name="birthd" id="birth" min="1922" max="2013" placeholder="1977" required
                           class="form-input">
                    <div class="radio">
                        <p>Nem:</p>
                        <label><input type="radio" name="gender" value="male"> Férfi</label>
                        <label><input type="radio" name="gender" value="female"> Nő</label>
                        <label><input type="radio" name="gender" value="other" checked> Egyéb</label>
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
<footer>
    <em>© A weboldalt készítette: Tóth Edina és Ördög Csaba</em>
</footer>
<script src="szkriptek/script.js"></script>
</body>
</html>