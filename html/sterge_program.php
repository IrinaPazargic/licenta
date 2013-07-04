<?php
require_once 'config.php';

if (!isset($_POST['titlu']) && !isset($_POST['data']) && !isset($_POST['ora'])) {
    die("Stergere nereusita!");
}
$titlu = mysql_real_escape_string($_POST['titlu']);
$data = mysql_real_escape_string($_POST['data']);
$ora = mysql_real_escape_string($_POST['ora']);

$query = "SELECT idFilm FROM filme WHERE titlu='$titlu'";
$rez = mysql_query($query);
$row = mysql_fetch_assoc($rez);
$id = $row['idFilm'];

mysql_query("DELETE FROM program WHERE idFilm='$id' AND program.data='$data' AND program.ora='$ora'")  or die(mysql_error());

echo "Ok";
