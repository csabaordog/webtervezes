<?php
    include_once "osztalyok/Felhasznalo.php";
    session_start();
if (!isset($_SESSION["felhasznalo"])) {
    header("Location: bejelentkezes.php");
}
