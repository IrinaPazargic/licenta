<?php
require_once 'config.php';
$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);

$sala = $_POST['sala'];
$id_tip = $_POST['id_tip'];
if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$stat = $mysqli->prepare("INSERT INTO sali (nr_sala, idTip) VALUES ('$sala', '$id_tip' )");
$success = $stat->execute();
$aff_rows = $mysqli->affected_rows;

if (!$success) {
    $mysqli->rollback();
    die("Fail to insert a person in DB");
} else if ($aff_rows == 0) {
    echo "Nu s-a putut inregistra sala $sala";
} else {
    echo "Inregistrare realizata cu succes!";
}
$mysqli->commit();
$stat->close();
$mysqli->close();
