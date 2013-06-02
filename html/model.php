<?php

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

class Persoana {
    public $nume;
    public $prenume;
    public $email;
    public $telefon;

    function __construct($nume = null, $prenume = null, $email = null, $telefon = null)
    {
        $this->nume = $nume;
        $this->prenume = $prenume;
        $this->email = $email;
        $this->telefon = $telefon;
    }

}

class Locuri{
    public $nrLocuri;
    public $tip;
    public $pret;
    public $locuri; // this is a concatenated list of sits. E.g: 1_1|1_2|2_1|2_2

    function __construct($tip, $nrLocuri, $pret, $locuri = "1_1")
    {
        $this->tip = $tip;
        $this->nrLocuri = $nrLocuri;
        $this->pret = $pret;
        $this->locuri = $locuri;
    }

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


