<?php
require_once 'config.php';
$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);
if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

// Retrieve data from Query String
$titlu=$_POST['titlu'];

$stat = $mysqli->prepare("DELETE FROM filme where titlu='$titlu'");
$success = $stat->execute();
$affRows = $mysqli->affected_rows;
if (!$success) {
    $mysqli->rollback();
    die("Stergere nereusita");
} else if ($affRows == 0) {
    echo "Nu s-a sters niciun film cu titlul $titlu pentru ca nu exista in BD";
} else {
    echo "S-au sters toate filmele cu titlul $titlu";
}

$mysqli->commit();
$stat->close();
$mysqli->close();