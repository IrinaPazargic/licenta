<?php
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);
if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$titlu = mysql_real_escape_string($_POST['titlu']);
$data = mysql_real_escape_string($_POST['data']);
$ora = mysql_real_escape_string($_POST['ora']);
$cinema = mysql_real_escape_string($_POST['cinema']);

$stat = $mysqli->prepare("DELETE FROM program
                          WHERE idFilm = (SELECT idFilm FROM filme WHERE titlu = '$titlu')
                          AND idCinema = (SELECT idCinema FROM cinema WHERE nume = '$cinema')
                          AND program.data = '$data'
                          AND ora = '$ora'");
$success = $stat->execute();
$affRows = $mysqli->affected_rows;
if (!$success) {
    $mysqli->rollback();
    die("Stergere nereusita");
} else if ($affRows == 0) {
    echo "Nu s-a sters nimic pentru ca programul cu filmul $titlu, data $data si ora $ora la cinematograful $cinema nu exista in BD";
} else {
    echo "Stergere realizata cu succes:Filmul $titlu din data $data,la ora $ora si cinematograful $cinema";
}

$mysqli->commit();
$stat->close();
$mysqli->close();
