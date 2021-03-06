<?php
require_once 'model.php';
require_once 'config.php';
require_once 'utils.php';

$rezervare = $_SESSION['rezervare'];

$email_username = "irina.pazargic@gmail.com";
$email_password = "gigel123"; //encrypt this value if you get some available time
$email_from = "irina.pazargic@gmail.com";
$email_to = $rezervare->persoana->email;
$email_subject = "Rezervare cinema";


rezerva($rezervare);

// for testing purpose. rezervare object should be retrieved from session.
// remove this function when the session based rezervare is available.


function salveazaSauCitestePersoana($persoana)
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

    $mysqli->autocommit(false);

    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }

    $stat1 = $mysqli->prepare("SELECT id FROM persoane WHERE nume = ? AND prenume = ?");
    $stat1->bind_param("ss", $persoana->nume, $persoana->prenume);
    $stat1->execute();
    $stat1->bind_result($res);
    $stat1->fetch();

    if ($res > 0) {
        $idPersoana = $res;
    } else {
        $stat2 = $mysqli->prepare("INSERT INTO persoane (nume, prenume, email, telefon) VALUES (?, ?, ?, ?)");
        $stat2->bind_param("ssss", $persoana->nume, $persoana->prenume, $persoana->email, $persoana->telefon);
        $success = $stat2->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Fail to insert a person in DB");
        }
        $idPersoana = $stat2->insert_id;
        $mysqli->commit();
        $stat2->close();
    }
    $stat1->close();
    $mysqli->close();
    return $idPersoana;
}

function salveazaRezervare($rezervare, $idPersoana)
{
    $idProgram = $rezervare->idProgram;

    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);

    $stat2 = $mysqli->prepare("INSERT INTO rezervare (id_persoana, id_program, locuri) VALUES (?, ?, ?)");
    $stat2->bind_param("iis", $idPersoana, $idProgram, $rezervare->locuri);
    $success = $stat2->execute();
    if (!$success) {
        $mysqli->rollback();
        die("Fail to insert a person in DB");
    }
    $idRezervare = $stat2->insert_id;
    $mysqli->commit();
    $stat2->close();
    $mysqli->close();

    return $idRezervare;
}

function salveazaLocurileRezervate($rezervare, $idRezervare)
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);
    foreach ($rezervare->tipLocuri as $loc) {
        if ($loc->nrLocuri == 0) {
            continue;
        }
        $stat1 = $mysqli->prepare("SELECT idReducere FROM reduceri WHERE tip = ?");
        $stat1->bind_param("s", $loc->tip);
        $stat1->execute();
        $stat1->bind_result($idReducere);
        $stat1->fetch();
        $stat1->close();

        $stat2 = $mysqli->prepare("INSERT INTO locuri_rezervate (idReducere, id_rezervare, nr_locuri) VALUES (?, ?, ?)");
        if (!$stat2) {
            printf("Errorcode: %d\n", $mysqli->errno);
            die("Cannot prepare statement for inser into locuri_rezervate");
        }
        $stat2->bind_param("iii", $idReducere, $idRezervare, $loc->nrLocuri);
        $success = $stat2->execute();
        if (!$success) {
            $mysqli->rollback();
            die("Nu se poate salva in DB locul rezervat.");
        }
        $stat2->close();

    }
    $mysqli->commit();
    $mysqli->close();
}

?>

<div style="background-color: white; margin: 50px auto; font: 1em Verdana, Arial, Helvetica, sans-serif; border: 1px solid green;">
<?php
    function rezerva($rezervare)
    {
    $idPersoana = salveazaSauCitestePersoana($rezervare->persoana);
    //    printf("Id persoana: %d\n", $idPersoana);
    $idRezervare = salveazaRezervare($rezervare, $idPersoana);
    //    printf("Id rezervare: %d\n", $idRezervare);
    salveazaLocurileRezervate($rezervare, $idRezervare);

    global $email_password;
    global $email_username;
    global $email_from;
    global $email_to;
    global $email_subject;
    $email_body = "Aveti rezervare la filmul '{$rezervare->film}',cinematograful '$rezervare->cinema', ora '$rezervare->ora', in data '$rezervare->data'.CODUL REZERVARII: '{$idRezervare}'.Acest cod trebuie prezentat la casa cu cel putin 30 min inainte de inceperea filmului. In caz contrar rezervarea se pierde.Va multumim!";
    trimite_email($email_username, $email_password, $email_from, $email_to, $email_subject, $email_body);

    print("Rezervare efectuata cu succes! Detaliile despre rezervare au fost trimise catre adresa de e-mail.</br> Pentru a reveni la pagina Acasa apasati aici <a href='index.php' style=' text-decoration: none; color: green;'>MyCinema.ro</a>");
    }?>

</div>


