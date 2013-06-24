<?php
require_once 'config.php';

$call = $_POST['call'];
if ($call == 'insert') {
    echo insert();
} else if ($call == 'update') {
    echo update();
} else if ($call == 'delete') {
    echo delete();
} else if ($call == 'search') {
    echo search();
}

function update()
{
    return "Successfully updated";
}

function delete()
{
    return "Successfully deleted";
}

function insert()
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);

    $sala = $_POST['nr_sala'];
    $randuri = $_POST['randuri'];
    $locuri = $_POST['locuri'];
    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }
    $stat = $mysqli->prepare("INSERT INTO sali (nr_sala, randuri, locuri) VALUES ('$sala', '$randuri', '$locuri')");
    $success = $stat->execute();
    if (!$success) {
        $mysqli->rollback();
        die("Fail to insert a person in DB");
    } else {
        $result = "Inregistrare realizata cu succes!";
    }
    $mysqli->commit();
    $mysqli->close();
    return $result;
}

function search()
{
    return "Successfully searched for...";
}
