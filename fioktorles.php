<?php
    include_once "osztalyok/Felhasznalo.php";
    include_once "adatkezeles.php";
    session_start();
    if(!isset($_SESSION["felhasznalo"])){
        header("Location: bejelentkezes.php");
    }
    $felhasznalok = adatokBetoltese("adatok/felhasznalok.txt");
    $felhasznalokUj = [];
    foreach ($felhasznalok as $felhasznalo){
        if($felhasznalo->getFelhasznaloNev() !== $_SESSION["felhasznalo"]->getFelhasznaloNev()){
            $felhasznalokUj[] = $felhasznalo;
        }
    }
    adatokMentese("adatok/felhasznalok.txt", $felhasznalokUj);
    header("Location: kijelentkezes.php");