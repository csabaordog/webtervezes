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
    echo "<nav><ul>" .
        "<li>" . ($aktualis === "index" ? "class='active'" : "") . ">" .
        "<a href='index.php' class='menu-link'>
            <div class='menu-link-tartalom'>Főoldal</div>
        </a>" .
        "</li>" .
        "<li" . ($aktualis === "kutya" ? "class='active'" : "") . ">" .
        "<a href='kutyak.php' class='menu-link'>
            <div class='menu-link-tartalom'>Kutyák</div>
        </a>" .
        "</li>" .
        "<li>" . ($aktualis === "termek" ? "class='active'" : "") . ">" .
        "<a href='termekek.php' class='menu-link'>
            <div class='menu-link-tartalom'>Termékek</div>
        </a>" .
        "</li>" .
        "<li" . ($aktualis === "erdekesseg" ? "class='active'" : "") . ">" .
        "<a href='erdekessegek.php' class='menu-link'>
            <div class='menu-link-tartalom'>Érdekességek</div>
        </a>" .
        "</li>" .
        "<li>" . ($aktualis === "kapcsolat" ? "class='active'" : "") . ">" .
        "<a href='kapcsolat.php' class='menu-link'>
            <div class='menu-link-tartalom'>Kapcsolat</div>
        </a>" .
        "</li>" .
        "<li" . ($aktualis === "beallitas" ? "class='active'" : "") . ">" .
        "<a href='beallitasok.php' class='menu-link'>
            <div class='menu-link-tartalom'>Beállítások</div>
        </a>" .
        "</li>" .
        "<li>" . ($aktualis === "bejelentkezes" ? "class='active'" : "") . ">" .
        "<a href='bejelentkezes.php' class='menu-link'>
            <div class='menu-link-tartalom'>Bejelentkezés</div>
        </a>" .
        "</li>" .
        "<li" . ($aktualis === "regisztracio" ? "class='active'" : "") . ">" .
        "<a href='regisztracio.php' class='menu-link'>
            <div class='menu-link-tartalom'>Regisztráció</div>
        </a>" .
        "</li>" .
        "</ul></nav>";
}

