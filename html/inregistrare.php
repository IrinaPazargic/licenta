<?php
require_once 'model.php';
require_once 'config.php';

$inregistrare= new Inregistrare();
$users= new Users();
inregistrare($inregistrare);


function inregistrare($inregistrare)
{
    $idUser = salveazaSauCitesteUser();
//    printf("Id persoana: %d\n", $idPersoana);
    salveazaInregistrare($idUser);
    print("Inregistrare salvata cu succes!");
}

function salveazaSauCitesteUser()
{
    $username = $_POST['username'];
    $password= $_POST['password'];
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

    $mysqli->autocommit(false);

    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }

    $stat1 = $mysqli->prepare("SELECT id FROM users WHERE username = '$username' AND password = '$password'");
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
        $mysqli->commit();
        $stat2->close();
    }
    $stat1->close();
    $mysqli->close();
    return $idUser;
}

function salveazaInregistrare($idUser)
{
    $nume=$_POST['nume'];
    $prenume=$_POST['prenume'];
    $email=$_POST['email'];
    $telefon=$_POST['tel'];
    $adresa=$_POST['adresa'];

    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);

        $stat1 = $mysqli->prepare("INSERT INTO detalii_membri (nume, prenume, email, adresa, telefon, id_users) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stat1) {
            printf("Errorcode: %d\n", $mysqli->errno);
            die("Cannot prepare statement for inser into locuri_rezervate");
        }
        $stat1->bind_param("ssssii", $nume, $prenume, $email, $adresa, $telefon, $idUser);
        $success = $stat1->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Nu se poate salva in DB locul rezervat.");
        }
        $stat1->close();

    $mysqli->commit();
    $mysqli->close();
}














