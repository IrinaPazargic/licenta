<?php
require_once 'config.php';
$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);

$cinematograf = $_POST['cinematograf'];

if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$stat = $mysqli->prepare("INSERT INTO cinema (nume) VALUES ('$cinematograf')");
$success = $stat->execute();
$aff_rows = $mysqli->affected_rows;

if (!$success) {
    $mysqli->rollback();
    die("Inregistrare esuata!");
} else if ($aff_rows == 0) {
    echo "Nu s-a putut inregistra cinematograful $cinematograf";
} else {
    echo "Inregistrare realizata cu succes: Cinematograful $cinematograf salvat!!";
}
$mysqli->commit();
$stat->close();
$mysqli->close();
