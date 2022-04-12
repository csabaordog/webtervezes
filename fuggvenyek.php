<?php

function profilkepFeltoltese(array &$hibak, string $felhasznalonev) {
    // Először érdemes megnézni, hogy ténylegesen feltöltött-e egy fájlt a felhasználó.

    if (isset($_FILES["profilkep"]) && is_uploaded_file($_FILES["profilkep"]["tmp_name"])) {
        // Hibakezelés: a fájlfeltöltés során adódó esetleges hibák.
        if ($_FILES["profilkep"]["error"] !== 0) {
            $hibak[] = "Hiba történt a fájlfeltöltés során!";
        }

        // Csak PNG és JPG kiterjesztésű képeket szeretnénk elfogadni.
        $engedelyezettKiterjesztesek = ["png", "jpg"];

        // A feltöltött fájl kiterjesztésének lekérdezése.
        $kiterjesztes = strtolower(pathinfo($_FILES["profilkep"]["name"], PATHINFO_EXTENSION));

        // Hibakezelés: nem megfelelő kiterjesztés.
        if (!in_array($kiterjesztes, $engedelyezettKiterjesztesek)) {
            $hibak[] = "A profilkép kiterjesztése hibás! Engedélyezett formátumok: " .
                implode(", ", $engedelyezettKiterjesztesek) . "!";
        }

        // Hibakezelés: túl nagy (5 MB-nál nagyobb) fájl.
        if ($_FILES["profilkep"]["size"] > 5242880) {
            $hibak[] = "A fájl mérete túl nagy!";
        }

        // Ha nem volt hiba, akkor összeállítjuk a profilkép mentési útvonalát, és megpróbáljuk elmenteni a fájlt.
        if (count($hibak) === 0) {

            $utvonal = "adatok/profilkepek/{$felhasznalonev}.{$kiterjesztes}";
            // Hibakezelés: sikertelen átmozgatás.
            if (!move_uploaded_file($_FILES["profilkep"]["tmp_name"], $utvonal)) {


                $hibak[] = "A profilkép elmentése nem sikerült!";
            }
        }
    }
}