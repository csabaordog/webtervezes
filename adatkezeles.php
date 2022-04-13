<?php

// Egy függvény, amely a második paraméterben kapott adattömb elemeit szerializálja és elmenti az első paraméterben
// kapott elérési útvonalon található fájlba.

function adatokMentese(string $fajlnev, array $adatok) {
    $file = fopen($fajlnev, "w");

    if (!$file) {
        die("Nem sikerült a fájl megnyitása!");
    }

    foreach ($adatok as $adat) {
        fwrite($file, serialize($adat) . "\n");
    }

    fclose($file);
}

// Egy függvény, amely a paraméterben kapott elérési útvonalon található fájlból beolvassa az adatokat.
// A függvény visszatérési értéke egy tömb, ami a PHP értékké alakított (más szóval deszerializált) adatokat tárolja.

function adatokBetoltese(string $fajlnev): array {
    $file = fopen($fajlnev, "r");
    $adatok = [];

    if (!$file) {
        die("Nem sikerült a fájl megnyitása!");
    }

    while (($sor = fgets($file)) !== false) {
        $adat = unserialize($sor);
        $adatok[] = $adat;
    }

    fclose($file);
    return $adatok;
}

function felhasznaloAdatainakModositasa(string $fajlnev, Felhasznalo $modositandoFelhasznalo) {
    $felhasznalok = adatokBetoltese($fajlnev);

    foreach ($felhasznalok as &$felhasznalo) {
        if ($felhasznalo->getFelhasznalonev() === $modositandoFelhasznalo->getFelhasznalonev()) {
            $felhasznalo = $modositandoFelhasznalo;
        }
    }

    adatokMentese($fajlnev, $felhasznalok);
}