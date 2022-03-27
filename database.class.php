<?php
/**
    Itten lenne egy osztály, ami nem a legideálisabban működik, de legalább nem kell sql-t írni :)
 */
    class Database{
        private $pdo;
        private $database = "mysql:host=localhost;dbname=kutyabirodalom";
        private $user = "root";
        private $password = "";
        private $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        //TODO majd check, hogy sikerült-e a csatlakozás az adatbázishoz
        function __construct(){
            try
            {
                $this -> pdo = new PDO($this -> database,  $this -> user,  $this -> password, $this -> options);
            }
            catch (PDOException $e)
            {
                echo "Adatbázishoz való csatlakozás sikertelen.";
                exit;
            }
        }

        function beszurFelhasznalo($felhasznalonev, $jelszo, $email, $nem){
            $this -> pdo -> prepare("INSERT INTO felhasznalo (felhasznalonev, jelszo, email, nem) VALUES(?, ?, ?, ?) ") -> execute([$felhasznalonev, password_hash("$jelszo", PASSWORD_DEFAULT), $email, $nem]);
        }

        function ellenorizFelhasznalo($felhasznalonev, $jelszo){
            $felhasznalok = $this -> tablaLekerdezAdatbazisbol("felhasznalok");
            foreach($felhasznalok as $felhasznalo){
                if($felhasznalo["felhasznalonev"] === $felhasznalonev && password_verify($jelszo, $felhasznalo["jelszo"])){
                    echo "Egyezik<br>";
                    break;
                }

            }
        }

        function tablaLekerdezAdatbazisbol($tabla){
            $lekerdezes = $this -> pdo -> query("SELECT * FROM $tabla");
            return $lekerdezes->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    $adatbazis = new Database;
    $adatbazis -> ellenorizFelhasznalo("Sanyi", "123");
    $adatbazis -> ellenorizFelhasznalo("Sanyi", "jelszo");
