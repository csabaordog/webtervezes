<?php
class Kutya{
    private string $nev;
    private string $kep;
    //Egyelőre 1 ára lesz 1 kutyafajtának
    private int $ar;
    private int $szukadDB;
    private int $himDB;

    public function __construct(string $nev, string $kep, int $ar, int $szukadDB, int $himDB)
    {
        $this->nev = $nev;
        $this->kep = $kep;
        $this->ar = $ar;
        $this->szukadDB = $szukadDB;
        $this->himDB = $himDB;

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


    public function getSzukadDB(): int
    {
        return $this->szukadDB;
    }


    public function setSzukadDB(int $szukadDB): void
    {
        $this->szukadDB = $szukadDB;
    }


    public function getHimDB(): int
    {
        return $this->himDB;
    }


    public function setHimDB(int $himDB): void
    {
        $this->himDB = $himDB;
    }

    public function getAr(): int
    {
        return $this->ar;
    }

    public function setAr(int $ar): void
    {
        $this->ar = $ar;
    }




}