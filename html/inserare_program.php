<?php
require_once 'model.php';
require_once 'config.php';


$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

$mysqli->autocommit(false);
$film = $_POST['titlu'];
$cinema = $_POST['cinema'];
$data = $_POST['data'];
$ora = $_POST['ora'];
$idSala = $_POST['idSala'];

if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$stat1 = $mysqli->prepare("SELECT idFilm FROM filme WHERE titlu = '$film'");
$stat1->execute();
$stat1->bind_result($resFilm);
$stat1->fetch();

if ($resFilm > 0) {
    $idFilm = $resFilm;

}
$stat1->close();

$stat2 = $mysqli->prepare("SELECT idCinema FROM cinema WHERE nume = '$cinema'");
$stat2->execute();
$stat2->bind_result($resCinema);
$stat2->fetch();

if ($resCinema > 0) {
    $idCinema = $resCinema;
}

$stat2->close();

$stat3 = $mysqli->prepare("INSERT INTO program (idFilm, idCinema, data, ora, idSala) VALUES ('$idFilm','$idCinema', '$data', '$ora', '$idSala')");
$success = $stat3->execute();
$aff_rows = $mysqli->affected_rows;
if (!$success) {
    $mysqli->rollback();
    die("Inregistrare esuata!");

} else if ($aff_rows == 0) {
    echo "Nu s-a putut inregistra filmul $film in program!";
} else {
    echo "Inregistrare cu succes: Filmul $film s-a salvat in program!";
}
$mysqli->commit();
$stat3->close();
$mysqli->close();











