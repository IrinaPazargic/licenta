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
if(!isset($_POST['tip'])) die("Stergeti tipul din program!");
$tip = mysql_real_escape_string($_POST['tip']);


mysql_query("DELETE FROM reduceri WHERE tip = '".$_POST['tip']."'") or die(mysql_error());

echo "Stergere realizata cu succes";
