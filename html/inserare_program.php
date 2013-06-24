<?php
require_once 'model.php';
require_once 'config.php';

function test($inregistrare)
{
    inregistrare_program();
    print("Inregistrare salvata cu succes!");
}

function inregistrare_program()
{
    $film = $_POST['titlu'];
    $cinematograf= $_POST['cinema'];
    $sala= $_POST['sala'];
    $data=$_POST['data'];
    $ora= $_POST['ora'];
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);
    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }
    $statFilm = $mysqli->prepare("SELECT idFilm FROM filme WHERE titlu = '$film'");
    $statFilm->execute();
    $statFilm->bind_result($resFilm);
    $statFilm->fetch();

    $statCinema = $mysqli->prepare("SELECT idCinema FROM cinema WHERE nume = '$cinematograf'");
    $statCinema->execute();
    $statCinema->bind_result($resCinema);
    $statCinema->fetch();

    $statSala = $mysqli->prepare("SELECT idSala FROM sali WHERE nr_sala = '$sala'");
    $statSala->execute();
    $statSala->bind_result($resSala);
    $statSala->fetch();

    if ($resFilm > 0 && $resCinema > 0 && $resSala > 0) {
        $idFilm = $resFilm;
        $idCinema = $resCinema;
        $idSala = $resSala;
        $statProgram = $mysqli->prepare("INSERT INTO program  (idFilm, idCinema, data, ora, idSala ) VALUES ('$idFilm', '$idCinema', '$data', '$ora', '$idSala')");
        if ($statProgram->execute()) {
            $mysqli->commit();
            echo "Inregistrare cu Succes!";
        } else {
            $mysqli->rollback();
            die("Fail to insert a person in DB");
        }
        $statProgram->close();
    }
    $statFilm->close();
    $statCinema->close();
    $statSala->close();
    $mysqli->close();
}
#fixme irina: Remove this if not used. In fact why should one use a hello??!! I supposed it was for debug purpose.
echo ("hello");









