<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "cinemadb";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());
// Retrieve data from Query String
if(!isset($_POST['titlu']) && !isset($_POST['data']) && !isset($_POST['ora']) ) die("Stergere nereusita!");
$titlu = mysql_real_escape_string($_POST['titlu']);
$data = mysql_real_escape_string($_POST['data']);
$ora = mysql_real_escape_string($_POST['ora']);


$query="select idFilm from filme where titlu='$titlu'";
$rez=mysql_query($query);
$row=mysql_fetch_assoc($rez);
$id=$row['idFilm'];

mysql_query("delete from program where idFilm='$id' and program.data='$data' and program.ora='$ora'")  or die(mysql_error());

echo "Ok";