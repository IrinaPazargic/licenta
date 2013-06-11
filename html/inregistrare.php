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
$inregistrare->nume=$nume;
$prenume=$_POST['prenume'];
$inregistrare->prenume=$prenume;
$email=$_POST['email'];
$inregistrare->email=$email;
$telefon=$_POST['tel'];
$inregistrare->telefon=$telefon;
$adresa=$_POST['adresa'];
$inregistrare->adresa=$adresa;
$username = $_POST['username'];
$users->username=$username;
$password= $_POST['password'];
$users->password=$password;

function inregistrare($inregistrare)
{
    $idUser = salveazaSauCitesteUser($inregistrare->id_users);
//    printf("Id persoana: %d\n", $idPersoana);
    salveazaLocurileRezervate($inregistrare, $idUser);
    print("Inregistrare salvata cu succes!");
}

function salveazaSauCitesteUser($user)
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

    $mysqli->autocommit(false);

    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }

    $stat1 = $mysqli->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    $stat1->bind_param("ss", $user->username, $user->password);
    $stat1->execute();
    $stat1->bind_result($res);
    $stat1->fetch();

    if ($res > 0) {
        $idUser = $res;
    } else {
        $stat2 = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stat2->bind_param("ss", $user->username,$user->password);
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

function salveazaInregistrare($inregistrare, $idUser)
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);

        $stat1 = $mysqli->prepare("INSERT INTO detalii_membri (nume, prenume, email, adresa, telefon, id_users) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stat1) {
            printf("Errorcode: %d\n", $mysqli->errno);
            die("Cannot prepare statement for inser into locuri_rezervate");
        }
        $stat1->bind_param("ssssii", $inregistrare->nume, $inregistrare->prenume, $inregistrare->email, $inregistrare->adresa, $inregistrare->telefon, $idUser);
        $success = $stat1->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Nu se poate salva in DB locul rezervat.");
        }
        $stat1->close();

    $mysqli->commit();
    $mysqli->close();
}














