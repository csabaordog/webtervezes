<?php
    session_start();
    include_once "osztalyok/Felhasznalo.php";
if (!isset($_SESSION["felhasznalo"])) {
    header("Location: bejelentkezes.php");
}
