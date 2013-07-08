<?php
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);
if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$sala = mysql_real_escape_string($_POST['sala']);

$stat = $mysqli->prepare("DELETE FROM sali WHERE nr_sala='$sala'");
$success = $stat->execute();
$aff_rows = $mysqli->affected_rows;

if (!$success) {
    $mysqli->rollback();
    die("Fail to delete from DB");
} else if ($aff_rows == 0) {
    echo "Nu s-a putut sterge sala $sala deoarece nu exista in BD.";
} else {
    echo "Stergere realizata cu succes!";
}
$mysqli->commit();
$stat->close();
$mysqli->close();
