<?php
require_once 'model.php';
require_once 'config.php';


function test($inregistrare)
{
    inregistrare_program();
    print("Inregistrare salvata cu succes!");
}

function inregistrare_program()
{
    $film = $_POST['titlu'];
    $cinematograf= $_POST['cinema'];
    $sala= $_POST['sala'];
    $data=$_POST['data'];
    $ora= $_POST['ora'];
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);

    $mysqli->autocommit(false);

    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta...");
    }

    $stat1 = $mysqli->prepare("SELECT idFilm FROM filme WHERE titlu = '$film'");
    $stat1->execute();
    $stat1->bind_result($res);
    $stat1->fetch();

    $stat2 = $mysqli->prepare("SELECT idCinema FROM cinema WHERE nume = '$cinematograf'");
    $stat2->execute();
    $stat2->bind_result($res1);
    $stat2->fetch();

    $stat3 = $mysqli->prepare("SELECT idSala FROM cinema WHERE nr_sala = '$sala'");
    $stat3->execute();
    $stat3->bind_result($res2);
    $stat3->fetch();


    if ($res > 0 && $res1 > 0 && $res2 > 0) {
        $idFilm = $res;
        $idCinema = $res1;
        $idSala = $res2;

        $stat4 = $mysqli->prepare("INSERT INTO program  (idFilm, idCinema, data, ora, idSala ) VALUES ('$idFilm', '$idCinema', '$data', '$ora', '$idSala')");
       while( $success = $stat4->execute()){
           echo "Inregistrare cu Succes!";
       }
        if (!$success) {
            $mysqli->rollback();
            die("Fail to insert a person in DB");
        }
        $mysqli->commit();

        $stat4->close();
    }
    $stat1->close();
    $stat2->close();
    $stat3->close();
    $mysqli->close();


}
echo ("hello");









