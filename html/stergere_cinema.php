<?php
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);
if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$cinematograf=$_POST['cinematograf'];
var_dump($cinematograf);

$cinema = mysql_real_escape_string($_POST['cinema']);

$stat = $mysqli->prepare("DELETE FROM cinema WHERE nume='$cinematograf'");
$success = $stat->execute();
$aff_rows = $mysqli->affected_rows;

if (!$success) {
    $mysqli->rollback();
    die("Stergere esuata");
} else if ($aff_rows == 0) {
    echo "Nu s-a putut sterge cinematograful $cinematograf deoarece nu exista in BD.";
} else {
    echo "Stergere realizata cu succes!";
}
$mysqli->commit();
$stat->close();
$mysqli->close();
