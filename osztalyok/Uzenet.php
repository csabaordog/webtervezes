<?php
    class Uzenet{
        private string $szoveg;
        private Felhasznalo $felhasznalo;
        private DateTime $letrehozva;

        public function getSzoveg(): string
        {
            return $this->szoveg;
        }

        public function setSzoveg(string $szoveg): void
        {
            $this->szoveg = $szoveg;
        }

        public function getFelhasznalo(): Felhasznalo
        {
            return $this->felhasznalo;
        }

        public function setFelhasznalo(Felhasznalo $felhasznalo): void
        {
            $this->felhasznalo = $felhasznalo;
        }

        public function getLetrehozva(): DateTime
        {
            return $this->letrehozva;
        }


        public function setLetrehozva(DateTime $letrehozva): void
        {
            $this->letrehozva = $letrehozva;
        }


        public function __construct(string $szoveg, Felhasznalo $felhasznalo, DateTime $letrehozva)
        {
            $this->szoveg = $szoveg;
            $this->felhasznalo = $felhasznalo;
            $this->letrehozva = $letrehozva;
        }

    }