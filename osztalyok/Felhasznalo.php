<?php

/**
Ennek az osztálynak a segítségével tárolhatjuk a felhasználókat és menthetjük is azokat az adatbázisba
 */
class Felhasznalo
{
    private string $felhasznalonev;
    private string $jelszo;
    private string $email;
    private int $szuletesiEv;
    private string $nem;
    private array $kosar;

    public function __construct(string $felhasznalonev, string $jelszo, string $email, int $szuletesiEv, string $nem)
    {
        $this->felhasznalonev = $felhasznalonev;
        $this->jelszo = $jelszo;
        $this->email = $email;
        $this->szuletesiEv = $szuletesiEv;
        $this->nem = $nem;
        $this->kosar = [];
    }


    public function getFelhasznalonev(): string
    {
        return $this->felhasznalonev;
    }

    public function setFelhasznalonev(string $felhasznalonev): void
    {
        $this->felhasznalonev = $felhasznalonev;
    }

    public function getJelszo(): string
    {
        return $this->jelszo;
    }

    public function setJelszo(string $jelszo): void
    {
        $this->jelszo = $jelszo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getSzuletesiEv(): int
    {
        return $this->szuletesiEv;
    }

    public function setSzuletesiEv(int $szuletesiEv): void
    {
        $this->szuletesiEv = $szuletesiEv;
    }

    public function getNem(): string
    {
        return $this->nem;
    }

    public function setNem(string $nem): void
    {
        $this->nem = $nem;
    }

    public function getKosar(): array
    {
        return $this->kosar;
    }

    public function setKosar(array $kosar): void
    {
        $this->kosar = $kosar;
    }

    public function kosarbaTesz(Kosar $ujTermek): void {
        foreach ($this->kosar as $termek) {
            if ($termek->getNev() === $ujTermek->getNev()) {
                $termek->setMennyiseg($termek->getMennyiseg() + 1);
                $termek->setAr($termek->getAr() + $ujTermek->getAr());
                return;
            }
        }

        $this->kosar[] = $ujTermek;
    }

    public function kosarbaTeszTermek(TermekKosar $ujTermek): void {
        foreach ($this->kosar as $termek) {
            if ($termek->getNev() === $ujTermek->getNev()) {
                $termek->setMennyiseg($termek->getMennyiseg() + 1);
                $termek->setAr($termek->getAr() + $ujTermek->getAr());
                return;
            }
        }

        $this->kosar[] = $ujTermek;
    }


    public function __toString(): string
    {
        return $this->felhasznalonev . ", születési év: " . $this->szuletesiEv . ", e-mail cím: " .
            $this->email . ", neme: " . $this->nem;
    }
}