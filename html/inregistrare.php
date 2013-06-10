<?php
require_once 'model.php';
require_once 'config.php';

class DbConfig
{
    public static $host = "localhost";
    public static $user = "root";
    public static $pass = "root";
    public static $db = "cinemadb";
}
    $inregistrare= new Inregistrare();
    $users= new Users();

$inregistrare->nume=$_POST['nume'];
$inregistrare->prenume=$_POST['prenume'];
$inregistrare->email=$_POST['email'];
$inregistrare->telefon=$_POST['tel'];
$inregistrare->adresa=$_POST['adresa'];
$users->username = $_POST['username'];
$users->password = $_POST['password'];

  function inregistrare($inregistrare)
{
    $idUser = users($inregistrare->idUser);
//    printf("Id persoana: %d\n", $idPersoana);
    salveazaInregistrare($inregistrare, $idUser);
    print("Inregistrarea s-a salvat cu succes.");
}



function users($users){
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

    $mysqli->autocommit(false);

    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }

    $stat1 = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
    $stat1->bind_param("s", $users->username);
    $stat1->execute();
    $stat1->bind_result($res);
    $stat1->fetch();

    if ($res > 0) {
        $idUser = $res;
    } else {
        $stat2 = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stat2->bind_param("ss", $users->username, $users->password);
        $success = $stat2->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Fail to insert a person in DB");
        }
        $idUser = $stat2->insert_id;
        $mysqli->commit();
        $stat2->close();
    }
    $stat1->close();
    $mysqli->close();
    return $idUser;
}

function salveazaInregistrare($inregistrare, $idUser){
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);

    $stat2 = $mysqli->prepare("INSERT INTO detalii_membri (nume, prenume, email, telefon, adresa, id_users) VALUES (?, ?, ?, ?, ?, ?)");
    $stat2->bind_param("sssisi", $inregistrare->nume, $inregistrare->prrenume, $inregistrare->email, $inregistrare->telefon, $inregistrare->adresa, $idUser);
    $success = $stat2->execute();
    if (!$success) {
        $mysqli->rollback();
        die("Fail to insert a person in DB");
    }
    $mysqli->commit();
    $stat2->close();
    $mysqli->close();
}








