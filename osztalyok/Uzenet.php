<?php
    class Uzenet{
        private string $szoveg;
        private string $felhasznalo;
        private DateTime $letrehozva;

        public function getSzoveg(): string
        {
            return $this->szoveg;
        }

        public function setSzoveg(string $szoveg): void
        {
            $this->szoveg = $szoveg;
        }

        public function getFelhasznalo(): string
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


        public function __construct(string $szoveg, Felhasznalo $felhasznalo)
        {
            $this->szoveg = $szoveg;
            $this->felhasznalo = $felhasznalo->getFelhasznalonev();
            $this->letrehozva = new DateTime();
            $this->letrehozva->setTimezone(new DateTimeZone("Europe/Budapest"));
        }

    }