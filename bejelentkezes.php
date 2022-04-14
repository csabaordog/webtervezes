<?php
    //Bejelentkezés kezelése
    include "menusav.php";
    include "osztalyok/Felhasznalo.php";
    include "adatkezeles.php";
    session_start();

    $felhasznalok = adatokBetoltese("adatok/felhasznalok.txt");
    $hiba = [];

    if(isset($_POST["login-btn"])){

        $felhasznalonev = $_POST["uname"];
        $jelszo = $_POST["password"];

        foreach ($felhasznalok as $felhasznalo){

            if($felhasznalo->getFelhasznalonev() === $felhasznalonev && password_verify($jelszo, $felhasznalo->getJelszo())){
                $_SESSION["felhasznalo"] = $felhasznalo;
                break;
            }

        }
        if(!isset($_SESSION["felhasznalo"])){
            $hiba[] = "Rossz felhasználónév vagy jelszó!";
        }
    }
    //TODO bejelentkezés utáni üzenet
    if(isset($_SESSION["felhasznalo"])){
        header("Location: profil.php");
    }

?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bejelentkezés</title>
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
<?php navigacioGeneralasa("bejelentkezes"); ?>
<main>

    <section class="kint">
        <h3>Bejelentkezés</h3>
        <div class="login">
            <form action="bejelentkezes.php" method="post" autocomplete="off">
                <fieldset>
                    <label for="usname">Felhasználónév:</label>
                    <input type="text" name="uname" id="usname" maxlength="20" placeholder="kutyaimado12" required
                           class="form-input">

                    <label for="pswd">Jelszó:</label>
                    <input type="password" name="password" id="pswd" maxlength="25" required class="form-input">

                </fieldset>
                <input type="submit" name="login-btn" value="Bejelentkezés" class="form-input gomb">
            </form>
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