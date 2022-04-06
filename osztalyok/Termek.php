<?php
    class Termek{
        private string $nev;
        private string $kep;
        private int $ar;


        public function __construct(string $nev, string $kep, int $ar)
        {
            $this->nev = $nev;
            $this->kep = $kep;
            $this->ar = $ar;
        }


        public function getNev(): string
        {
            return $this->nev;
        }


        public function setNev(string $nev): void
        {
            $this->nev = $nev;
        }


        public function getKep(): string
        {
            return $this->kep;
        }

        public function setKep(string $kep): void
        {
            $this->kep = $kep;
        }


        public function getAr(): int
        {
            return $this->ar;
        }


        public function setAr(int $ar): void
        {
            $this->ar = $ar;
        }

        public function __toString(): string
        {
            // TODO: Implement __toString() method.
            return "";
        }


    }