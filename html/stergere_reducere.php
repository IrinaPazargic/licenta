<?php
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);
if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$tip=$_POST['tip'];

$stat = $mysqli->prepare("DELETE FROM reduceri where tip='$tip'");
$success = $stat->execute();
$affRows = $mysqli->affected_rows;
if (!$success) {
    $mysqli->rollback();
    die ("Stergere nereusita");
} else if ($affRows == 0) {
    echo "Nu s-a sters nicio reducere de tipul $tip deoarece nu exista in BD!";
} else {
    echo "S-a sters reducerea cu tipul $tip!";
}

$mysqli->commit();
$stat->close();
$mysqli->close();