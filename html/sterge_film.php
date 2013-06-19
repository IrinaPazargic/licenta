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
if(!isset($_POST['titlu'])) die("Stergeti filmul din program!");
$titlu = mysql_real_escape_string($_POST['titlu']);


mysql_query("DELETE FROM filme WHERE titlu = '$titlu'") or die(mysql_error());

echo "Ok";
