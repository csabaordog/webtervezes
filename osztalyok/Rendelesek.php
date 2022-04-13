<?php

class Rendelesek {
    private string $megrendelo;
    private array $rendelesTartalma;
    private DateTime $rendelesDatuma;
    private bool $teljesitett;

    public function __construct(string $felhasznalonev, array $rendelesTartalma) {
        $this->megrendelo = $felhasznalonev;
        $this->rendelesTartalma = $rendelesTartalma;
        $this->teljesitett = false;
        $this->rendelesDatuma = new DateTime();
        $this->rendelesDatuma->setTimezone(new DateTimeZone("Europe/Budapest"));
    }


    public function getMegrendelo(): string
    {
        return $this->megrendelo;
    }


    public function setMegrendelo(string $megrendelo): void
    {
        $this->megrendelo = $megrendelo;
    }


    public function getRendelesTartalma(): array
    {
        return $this->rendelesTartalma;
    }


    public function setRendelesTartalma(array $rendelesTartalma): void
    {
        $this->rendelesTartalma = $rendelesTartalma;
    }


    public function getRendelesDatuma(): DateTime
    {
        return $this->rendelesDatuma;
    }


    public function setRendelesDatuma(DateTime $rendelesDatuma): void
    {
        $this->rendelesDatuma = $rendelesDatuma;
    }


    public function isTeljesitett(): bool
    {
        return $this->teljesitett;
    }


    public function setTeljesitett(bool $teljesitett): void
    {
        $this->teljesitett = $teljesitett;
    }


}