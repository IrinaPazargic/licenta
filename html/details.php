<?php
    require_once 'config.php';

$localitate = $_POST['nume'];
$categorie = $_POST['gen'];
$titlu=$_POST['titlu'];
$data=$_POST['data']

    $sql = "";
    $result = mysql_query($sql);
    $row=mysql_fetch_array($result);

?>
