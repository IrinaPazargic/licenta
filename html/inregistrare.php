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

$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$email=$_POST['email'];
$telefon=$_POST['tel'];
$adresa=$_POST['adresa'];
$username = $_POST['username'];
$password= $_POST['password'];



    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

    $mysqli->autocommit(false);

    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }

    $stat1 = $mysqli->prepare("SELECT id FROM cinemadb.users WHERE username = '$username' and password='$password'");
    $stat1->execute();
    $stat1->bind_result($res);
    $stat1->fetch();

    if ($res > 0) {
        $idUser = $res;
    } else {
        $stat2 = $mysqli->prepare("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        $success = $stat2->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Fail to insert a person in DB");
        }
        $idUser = $stat2->insert_id;

        $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
        $mysqli->autocommit(false);

        $stat3 = $mysqli->prepare("INSERT INTO cinemadb.detalii_membri (nume, prenume, email, telefon, adresa, id_users) VALUES ('$nume', '$prenume', '$email', '$telefon','$adresa' '$idUser')");
        $success = $stat3->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Fail to insert a person in DB");
        }
        $mysqli->commit();
        $stat3->close();
        $stat2->close();
        $stat1->close();
        $mysqli->close();
    }











