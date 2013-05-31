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

    public $film;
    public $cinema;
    public $sala;
    public $data;
    public $ora;

    public $locuri; // associative array (key=id_tip_reducere, value=numar de locuri);
}

