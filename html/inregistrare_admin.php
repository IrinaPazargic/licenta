<?php
require_once 'model.php';
require_once 'config.php';

$mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

$mysqli->autocommit(false);

if ($mysqli->connect_errno) {
    die ("Nu se poate conecta...");
}
$username = $_POST['username'];
$password = $_POST['password'];

$stat1 = $mysqli->prepare("SELECT id FROM users WHERE username = '$username' AND password =                              md5('$password')");
$stat1->execute();
$stat1->bind_result($resUser);
$stat1->fetch();

if ($resUser > 0) {
    echo "User $username existent!";

}
$stat1->close();

$idUser = $resUser;
$stat2 = $mysqli->prepare("INSERT INTO users (username, password) VALUES ('$username', md5('$password'))");
$success = $stat2->execute();
if (!$success) {
    $mysqli->rollback();
    die("Inregistrare user esuata!");
}
$idUser = $stat2->insert_id;
$mysqli->commit();
$stat2->close();

$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$adresa = $_POST['adresa'];

$stat3 = $mysqli->prepare("INSERT INTO detalii_membri (nume, prenume, email, adresa, telefon, id_users) VALUES ('$nume', '$prenume', '$email', '$adresa', '$telefon','$idUser')");
$success = $stat3->execute();
$affRows = $stat3->affected_rows;
if (!$success) {
    $mysqli->rollback();
    die("Inregistrare esuata!");
} else if ($affRows == 0) {
    echo "Nu s-a putut inregistra administratorul cu Numele $nume si user-ul $username";
}else {
    echo "Administratorul cu username-ul $username s-a salvat cu succes! Conectati-va la pagina de administrare accesand meniu Log in!";
}

$mysqli->commit();
$stat3->close();
$mysqli->close();

$stat1->close();
$mysqli->close();