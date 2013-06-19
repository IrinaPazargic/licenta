<?php
require_once 'model.php';
require_once 'config.php';


$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

$mysqli->autocommit(false);

if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}


$stat1 = $mysqli->prepare("INSERT INTO reduceri (tip, pret) VALUES ('".$_POST['tip']."', '".$_POST['pret']."')");

$success = $stat1->execute();
if (!$success) {
    $mysqli->rollback();
    die("Fail to insert a person in DB");
}else{
    echo "Inregistrare realizata cu succes!";
}
$mysqli->commit();
$stat1->close();