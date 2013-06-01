<?php

class Persoana {
    public $nume;
    public $prenume;
    public $email;
    public $telefon;
}

class Rezervare {
    public $idProgram;

    public $persoana;
    public $locuri;

    public $film;
    public $cinema;
    public $sala;
    public $data;
    public $ora;


}

class TipRedurecere{
    public $tip;
    public $pret;

    function __construct($tip, $pret)
    {
        $this->pret = $pret;
        $this->tip = $tip;
    }

    function __toString()
    {
        return $this->tip . ' ' . $this->pret;
    }

}

class Locuri{
    public $nrLocuri;
    public $tip;
    public $pret;

    function __construct($tip, $nrLocuri, $pret)
    {
        $this->tip = $tip;
        $this->nrLocuri = $nrLocuri;
        $this->pret = $pret;
    }


}


