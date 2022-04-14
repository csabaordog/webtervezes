<?php
    /*
     * Na ide kéne megírni a menüt, majd include-olni a többi oldalon és akkor csak itt lesz egy helyen megírva a menü
     * amire figyelni kéne, az az hogy az aktuális oldalon mindig a href="#" legyen, mert ugye saját magára
     * kéne mutasson, meg van egy menu-logo doboz, aminek mindig más a tartalma
     * ...ohh meg egyes menüpontok csak akkor kell megjelenjenek, ha a felhasználó nincs bejelentkezve (pl. a regisztrációs oldal)
     * de ezzel még ráér foglalkozni
     * A 8. gyakorlaton a függvenyek.php-ban van navigacioGeneralasa függvény, az alapján szerintem meg lehet csinálni,
     * ha esetleg van rá időd csináld nyugodtan, de majd ha lesz időm megcsinálom
     */


function navigacioGeneralasa(string $aktualis)
{
    //TODO majd azt is meg kellene oldani, hogy mondjuk ha a felhasználó be van jelentkezve,
    // akkor ne jelenjen meg se a bejelentkezés, se a regisztráció, de mondjuk legyen kijelentkezés, kosár, stb..
    echo '<nav id="menu">
        <div id="menu-logo">Kutya birodalom</div>
        <input id="menu-toggle" type="checkbox"/>
        <div class="hamburger-gomb-container" onclick="hamburger()">
            <div class="hamburger-gomb"></div>
        </div>
        <div id="menu-bg"></div>
        <div id="menu-pontok">
            <a href="index.php" class="menu-link '. ($aktualis === "index" ? "active" : "") .'">
                <div class="menu-link-tartalom">Főoldal</div>
            </a>
            <a href="kutyak.php" class="menu-link '. ($aktualis === "kutyak" ? "active" : "") .'">
                <div class="menu-link-tartalom">Kutyák</div>
            </a>
            <a href="termekek.php" class="menu-link '. ($aktualis === "termekek" ? "active" : "") .'">
                <div class="menu-link-tartalom">Termékek</div>
            </a>
            <a href="erdekessegek.php" class="menu-link '. ($aktualis === "erdekessegek" ? "active" : "") .'">
                <div class="menu-link-tartalom">Érdekességek</div>
            </a>
            <a href="kapcsolat.php" class="menu-link '. ($aktualis === "kapcsolat" ? "active" : "") .'">
                <div class="menu-link-tartalom">Kapcsolat</div>
            </a>';
            
            if(!isset($_SESSION["felhasznalo"])) {
                echo '<a href="bejelentkezes.php" class="menu-link ' . ($aktualis === "bejelentkezes" ? "active" : "") . '">
                <div class="menu-link-tartalom">Bejelentkezés</div>
            </a>
            <a href="regisztracio.php" class="menu-link ' . ($aktualis === "regisztracio" ? "active" : "") . '">
                <div class="menu-link-tartalom">Regisztráció</div>
            </a>';
            }else{
                echo'<a href="profil.php" class="menu-link '. ($aktualis === "profil" ? "active" : "") .'">
                <div class="menu-link-tartalom">Profil</div>
            </a>';
            if($_SESSION["felhasznalo"]->getFelhasznalonev() === "admin"){
                echo '<a href="rendelesek.php" class="menu-link ' . ($aktualis === "rendelesek" ? "active" : "") . '">
                <div class="menu-link-tartalom">Rendelések</div>
            </a>';
                } else {
                echo '<a href="kosar.php" class="menu-link '. ($aktualis === "kosar" ? "active" : "") .'">
                <div class="menu-link-tartalom">Kosár</div>
            </a>';

            }


            }
        echo '</div>
    </nav>';
}

