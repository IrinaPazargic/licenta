<?php
require_once 'config.php';

/**
 * @param $fn
 * @return array
 */
function uploadFiles($fn)
{
    echo "Uploading..." . $fn;
    $success = false;
    if ($fn) {
        echo "... through AJAX...";
        // AJAX call
        file_put_contents(
            'uploads/' . $fn,
            file_get_contents('php://input')
        );
        echo "$fn uploaded";
        $success = true;
    } else {
        // form submit
        echo "... through form submit...";
        $files = $_FILES['fileselect'];
        var_dump($files);
        foreach ($files['error'] as $id => $err) {
            echo $id . ", " . $err . "\n";
            echo "<p>err == UPLOAD_ERR_OK ?" . ($err == UPLOAD_ERR_OK) . "</p>";
            if ($err == UPLOAD_ERR_OK) {
                $fn = $files['name'][$id];
                echo "fn = " . $fn;
                $success = move_uploaded_file(
                    $files['tmp_name'][$id],
                    'uploads/' . $fn
                );
                echo "<p>File $fn uploaded.</p>";
            } else {
                echo "<p>Error while uploading the file '" . $fn . "'. Error is: " . $err . "</p>";
            }
        }
    }
    return $success;
}

function save($titlu, $gen, $an, $durata, $descriere, $regia, $imagine, $rol)
{
    $mysqli = new mysqli(DbConfig::$host, DbConfig::$user, DbConfig::$pass, DbConfig::$db);
    $mysqli->autocommit(false);
    if ($mysqli->connect_errno) {
        die ("Nu se poate conecta la DB...");
    }

    $stat = $mysqli->prepare("
      INSERT INTO filme
      (titlu, an, timp_desf, descriere, regia, imagine, roluri_principale, idGen)
      VALUES ('$titlu', '$an', '$durata', '$descriere', '$regia', '$imagine', '$rol', '$gen')
      ");
    $success = $stat->execute();
    $affRows = $mysqli->affected_rows;
    if (!$success) {
        $mysqli->rollback();
        die("Inregistrare nereusita!");
    } else if ($affRows == 0) {
        echo "Inregistrare nereusita: Filmul $titlu nu s-a putut inregistra in BD!";
    } else {
        echo "Inregistrare efectuata cu succes: Filmul '$titlu' s-a inregistrat cu succes.";
    }
    $mysqli->commit();
    $stat->close();
    $mysqli->close();
}

$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
$success = uploadFiles($fn);

$target_path = "uploads/";
$titlu = $_POST['titlu'];
$gen = $_POST['idGen'];
$an = $_POST['an'];
$durata = $_POST['durata'];
$descriere = $_POST['descriere'];
$regia = $_POST['regia'];
$imagine = $fn ? $target_path . basename($fn) : null;
$rol = $_POST['rol'];
save($titlu, $gen, $an, $durata, $descriere, $regia, $imagine, $rol);

