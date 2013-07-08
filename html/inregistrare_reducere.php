<?php
require_once 'model.php';
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
$mysqli->autocommit(false);
if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}
$tip = $_POST['tip'];
$pret = $_POST['pret'];

$stat = $mysqli->prepare("INSERT INTO reduceri (tip, pret)
                                  VALUES ('$tip', '$pret')");
$success = $stat->execute();
if (!$success) {
    $mysqli->rollback();
    die("Inregistrare nereusita");
} else {
    echo "Inregistrare realizata cu succes: Reducere cu tipul $tip si pretul $pret lei!";
}
$mysqli->commit();
$stat->close();
