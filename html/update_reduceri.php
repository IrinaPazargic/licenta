<?php
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

$mysqli->autocommit(false);

if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}

$id=$_POST['id'];

if(isset($id)){
    $tip=$_POST['first'];
    $pret=$_POST['last'];
    $stat1 = $mysqli->prepare("UPDATE reduceri set tip='$tip', pret='$pret' where id='$id'");
    $stat1->execute();
    $affRows = $mysqli->affected_rows;
    if (!$success) {
        $mysqli->rollback();
        die("Editare esuata!");
    }
    if ($affRows == 0){
        echo "Editare nereusita!";
    }else{
        echo "Editare cu succes";
    }

}
