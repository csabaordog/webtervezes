<?php
/**
    Itten lenne egy osztály, ami nem a legideálisabban működik, de legalább nem kell sql-t írni :)
 */
    class AdatbazisKezelo{
        private $pdo;
        //adatbázis elérése ide
        private $database = "mysql:host=localhost;dbname=kutyabirodalom";
        //adatbázishoz felhasználónév
        private $user = "root";
        //adatbázishoz jelszó
        private $password = "";
        //Ha hiba keletkezik, akkor a PDO object hibát dob
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

        /**
            A paraméterben kapott felhasználó adatokat eltárolja az adatbázisban
         */
        function beszurFelhasznalo($felhasznalonev, $jelszo, $email, $nem){
            $this -> pdo -> prepare("INSERT INTO felhasznalo (felhasznalonev, jelszo, email, nem) VALUES(?, ?, ?, ?) ") -> execute([$felhasznalonev, password_hash("$jelszo", PASSWORD_DEFAULT), $email, $nem]);
        }

        /**
            Leellenőrzi, hogy a paraméterben kapott felhasználónév és jelszó szerepel-e
           az adatbázisban "felhasznalonev" és "jelszo" oszlopnevek alatt
         */
        function ellenorizFelhasznalo($felhasznalonev, $jelszo){
            $felhasznalok = $this -> tablaLekerdezAdatbazisbol("felhasznalok");
            foreach($felhasznalok as $felhasznalo){
                if($felhasznalo["felhasznalonev"] === $felhasznalonev && password_verify($jelszo, $felhasznalo["jelszo"])){
                    return true;
                }
            }
            return false;
        }

        /**
          A paraméterben kapott táblát lekérdezi az adatbázisból és visszaadja. pl. tablaLekerdezAdatbazisbol("termekek")
         */
        function tablaLekerdezAdatbazisbol($tabla){
            $lekerdezes = $this -> pdo -> query("SELECT * FROM $tabla");
            return $lekerdezes->fetchAll(PDO::FETCH_ASSOC);
        }
    }

