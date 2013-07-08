<?php
require_once 'model.php';
require_once 'config.php';

$rezervare = $_SESSION['rezervare'];

rezerva($rezervare);

// for testing purpose. rezervare object should be retrieved from session.
// remove this function when the session based rezervare is available.


function rezerva($rezervare)
{
    $idPersoana = salveazaSauCitestePersoana($rezervare->persoana);
//    printf("Id persoana: %d\n", $idPersoana);
    $idRezervare = salveazaRezervare($rezervare, $idPersoana);
//    printf("Id rezervare: %d\n", $idRezervare);
    salveazaLocurileRezervate($rezervare, $idRezervare);
    print("Rezervarea s-a salvat cu succes.");
}

function salveazaSauCitestePersoana($persoana)
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

    $mysqli->autocommit(false);

    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }

    $stat1 = $mysqli->prepare("SELECT id FROM persoane WHERE nume = ? AND prenume = ?");
    $stat1->bind_param("ss", $persoana->nume, $persoana->prenume);
    $stat1->execute();
    $stat1->bind_result($res);
    $stat1->fetch();

    if ($res > 0) {
        $idPersoana = $res;
    } else {
        $stat2 = $mysqli->prepare("INSERT INTO persoane (nume, prenume, email, telefon) VALUES (?, ?, ?, ?)");
        $stat2->bind_param("ssss", $persoana->nume, $persoana->prenume, $persoana->email, $persoana->telefon);
        $success = $stat2->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Fail to insert a person in DB");
        }
        $idPersoana = $stat2->insert_id;
        $mysqli->commit();
        $stat2->close();
    }
    $stat1->close();
    $mysqli->close();
    return $idPersoana;
}

function salveazaRezervare($rezervare, $idPersoana)
{
    $idProgram = $rezervare->idProgram;

    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);

    $stat2 = $mysqli->prepare("INSERT INTO rezervare (id_persoana, id_program, locuri) VALUES (?, ?, ?)");
    $stat2->bind_param("iis", $idPersoana, $idProgram, $rezervare->locuri);
    $success = $stat2->execute();
    if (!$success) {
        $mysqli->rollback();
        die("Fail to insert a person in DB");
    }
    $idRezervare = $stat2->insert_id;
    $mysqli->commit();
    $stat2->close();
    $mysqli->close();

    return $idRezervare;
}

function salveazaLocurileRezervate($rezervare, $idRezervare)
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);
    foreach ($rezervare->tipLocuri as $loc) {
        if ($loc->nrLocuri == 0) {
            continue;
        }
        $stat1 = $mysqli->prepare("SELECT idReducere FROM reduceri WHERE tip = ?");
        $stat1->bind_param("s", $loc->tip);
        $stat1->execute();
        $stat1->bind_result($idReducere);
        $stat1->fetch();
        $stat1->close();

        $stat2 = $mysqli->prepare("INSERT INTO locuri_rezervate (idReducere, id_rezervare, nr_locuri) VALUES (?, ?, ?)");
        if (!$stat2) {
            printf("Errorcode: %d\n", $mysqli->errno);
            die("Cannot prepare statement for inser into locuri_rezervate");
        }
        $stat2->bind_param("iii", $idReducere, $idRezervare, $loc->nrLocuri);
        $success = $stat2->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Nu se poate salva in DB locul rezervat.");
        }
        $stat2->close();
    }
    $mysqli->commit();
    $mysqli->close();
}



