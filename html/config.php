<?php
$host="localhost";
$user="root";
$pass="root";
$db="cinemadb";
mysql_connect($host,$user,$pass) or die ("nu se poate conecta");
mysql_select_db($db) or die("nu poate intra in baza de date");

?>