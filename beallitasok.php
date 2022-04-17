<?php

    include "menusav.php";
    include_once "osztalyok/Felhasznalo.php";
    include_once "adatkezeles.php";
    include_once "fuggvenyek.php";

    session_start();
if (!isset($_SESSION["felhasznalo"])) {
    header("Location: bejelentkezes.php");
}
    define("DEFAULT_PROFILKEP", "adatok/profilkepek/default.jpg");
    $profilkep = DEFAULT_PROFILKEP;
    $felhasznalok = adatokBetoltese("adatok/felhasznalok.txt");
    $hibak = [];

    if(isset($_POST["settings-btn"])) {
        //Űrlapadatok mentése
        $felhasznalonev = $_POST["uname"];
        $eredetinev = $_SESSION["felhasznalo"] -> getFelhasznalonev();
        $jelszo = $_POST["password"];
        $ellenorzoJelszo = $_POST["password2"];
        $email = $_POST["mail"];
        $szuletesiEv = $_POST["birthd"];
        $profilkep = $_FILES["profilkep"];

        if ($jelszo !== "") {
            if (strlen($jelszo) < 5) {
                $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";
            }

            //Jelszó validálás
            if (!(preg_match("/[A-Za-z]/", $jelszo) && preg_match("/[0-9]/", $jelszo))) {
                $hibak[] = "A jelszónak tartalmaznia kell betűt és számjegyet is!";
            }
        }


        //Email cím validálás
        if ($email !== "") {
            if (!preg_match("/[0-9a-z\.\-]+@([0-9a-z\-]+\.)[a-z]{2,4}/", $email)) {
                $hibak[] = "A megadott e-mail cím formátuma nem megfelelő!";
            }
        }


        //Jelszavak egyezésének ellenőrzése
        if ($jelszo !== $ellenorzoJelszo) {
            $hibak[] = "A megadott jelszavak nem egyeznek!";
        }

        foreach ($felhasznalok as $felhasznalo) {
            if ($felhasznalo->getEmail() === $email) {
                $hibak[] = "Az email cím foglalt!";
            }
            if ($felhasznalo->getFelhasznalonev() === $felhasznalonev) {
                $hibak[] = "A felhasználónév már foglalt!";
            }
        }
        if ($felhasznalonev === "default") {
            $hibak[] = "A felhasználónév már foglalt!";
        }
        if(is_uploaded_file($profilkep["tmp_name"])){
            profilkepFeltoltese($hibak, ($felhasznalonev == "") ? $_SESSION["felhasznalo"]->getFelhasznalonev() : $felhasznalonev);
        }

        if (count($hibak) === 0) {
            if ($felhasznalonev !== "" && $felhasznalonev !== $_SESSION["felhasznalo"]->getFelhasznalonev()) {
                $_SESSION["felhasznalo"]->setFelhasznalonev($felhasznalonev);
            }
            if ($jelszo !== "" && $jelszo === $ellenorzoJelszo) {
                $_SESSION["felhasznalo"]->setJelszo(password_hash($jelszo, PASSWORD_DEFAULT));
            }
            if ($email !== "" && $email !== $_SESSION["felhasznalo"]->getEmail()) {
                $_SESSION["felhasznalo"]->setEmail($email);
            }
            if ($szuletesiEv !== "" && $szuletesiEv !== $_SESSION["felhasznalo"]->getSzuletesiev()) {
                $_SESSION["felhasznalo"]->setSzuletesiev($szuletesiEv);
            }
            if(is_uploaded_file($profilkep["tmp_name"])) {
                $kit = strtolower(pathinfo($profilkep["name"], PATHINFO_EXTENSION));
                $utvonal = "adatok/profilkepek/" . $_SESSION["felhasznalo"]->getFelhasznalonev() . "." . $kit;
                if ($utvonal !== $profilkep && $profilkep !== DEFAULT_PROFILKEP) {
                    unlink($profilkep);
                }
            }
            $kiterjesztes = ".jpg";
            if(file_exists($_SESSION["felhasznalo"]->getFelhasznalonev()."png")){
                $kiterjesztes = ".png";
            }
            if($_SESSION["felhasznalo"]->getFelhasznalonev() !== $eredetinev && $eredetinev !== "default"){
                rename("adatok/profilkepek/".$eredetinev.$kiterjesztes, "adatok/profilkepek/".$_SESSION["felhasznalo"]->getFelhasznalonev().$kiterjesztes );
            }

            $ujFelhasznalok = [];
            foreach ($felhasznalok as $felhasznalo){

                if($felhasznalo->getFelhasznalonev() === $eredetinev){

                    $ujFelhasznalok[] = $_SESSION["felhasznalo"];
                }else{
                    $ujFelhasznalok[] = $felhasznalo;
                }
            }
            adatokMentese("adatok/felhasznalok.txt", $ujFelhasznalok);
            header("Location: beallitasok.php?siker=true");
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beállítások</title>
    <link rel="stylesheet" href="stilusok/menu.css" type="text/css">
    <link rel="stylesheet" href="stilusok/stilusok.css" type="text/css">
    <link rel="stylesheet" href="stilusok/regisztracio.css" type="text/css">
    <link rel="icon" href="media/ikon.jpg" type="image/ico">

</head>
<body>
<header>
    <h1>Beállítások</h1>
    <h2>Az állatimádók oldala</h2>
</header>
<?php navigacioGeneralasa("beallitasok"); ?>
<main>
    <section class="kint">
        <?php
        if (isset($_GET["siker"])) {
            echo "<div class='siker'>Sikeres adatmegváltoztatás!</div>";
        }
        if (count($hibak) > 0) {
            echo "<div class='hibak'>";

            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }

            echo "</div>";
        }
        ?>
        <form action="beallitasok.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <legend>Személyes adatok:</legend>
            <label for="usname">Felhasználónév megváltoztatása:</label>
            <input type="text" name="uname" id="usname" maxlength="20" placeholder="kutyaimado12"
                   class="form-input" >

            <label for="pswd">Jelszó megváltoztatása:</label>
            <input type="password" name="password" id="pswd" maxlength="25" class="form-input">

            <label for="pswd2">Jelszó ismét:</label>
            <input type="password" name="password2" id="pswd2" maxlength="25" class="form-input">

            <label for="email">E-mail cím megváltoztatása:</label>
            <input type="email" name="mail" id="email" placeholder="valaki@gmail.com"
                   class="form-input" >

            <label for="birth">Születési év megváltoztatása:</label>
            <input type="number" name="birthd" id="birth" min="1922" max="2013" placeholder="1977"
                   class="form-input" >

            <label for="profilkep">Profilkép megváltoztatása:</label>
            <input type="file" name="profilkep" id="profilkep" accept="image/*" class="form-input">


            <input type="submit" name="settings-btn" value="Megváltoztat" class="gomb form-input">

        </form>
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