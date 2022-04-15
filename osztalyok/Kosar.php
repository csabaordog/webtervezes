<?php

class Kosar{
    private string $nev;
    private int $ar;
    private int $mennyiseg;

    //kiszamolja, hogy mibol mennyit vett
    public function __construct(Kutya $termek, int $mennyiseg=1) {
        $this->nev = $termek->getNev();
        $this->mennyiseg = $mennyiseg;
        $this->ar = $this->mennyiseg * $termek->getAr();
    }


    public function getNev(): string
    {
        return $this->nev;
    }


    public function setNev(string $nev): void
    {
        $this->nev = $nev;
    }


    public function getAr()
    {
        return $this->ar;
    }


    public function setAr($ar): void
    {
        $this->ar = $ar;
    }


    public function getMennyiseg(): int
    {
        return $this->mennyiseg;
    }


    public function setMennyiseg(int $mennyiseg): void
    {
        $this->mennyiseg = $mennyiseg;
    }

    public function __toString(): string {
        return "";
    }

}