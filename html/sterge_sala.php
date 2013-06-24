<?php
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

$mysqli->autocommit(false);

if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$sala= mysql_real_escape_string($_POST['nr_sala']);

$stat = $mysqli->prepare("delete from sali where nr_sala='$sala'");
$success = $stat->execute();
if (!$success) {
    $mysqli->rollback();
    die("Fail to delete from DB");
}else{
    echo "Stergere realizata cu succes!";
}
$mysqli->commit();
$stat->close();
