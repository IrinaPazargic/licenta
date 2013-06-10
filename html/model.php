<?php

class Inregistrare{
    public $nume;
    public $prenume;
    public $email;
    public $telefon;
    public $adresa;
    public $idUser;

}

class Users{
    public $username;
    public $password;

    function __construct($username = null, $password = null)
    {
        $this->username = $username;
        $this->password = $password;

    }
}




class Rezervare {
    public $idProgram;
    public $tipLocuri;

    public $persoana;


    public $film;
    public $cinema;
    public $sala;
    public $data;
    public $ora;
    public $locuri;
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

class TipLocuri{
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


