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
//$tip = $_GET['tip'];
// Escape User Input to help prevent SQL Injection
//$tip = mysql_real_escape_string($tip);

//build query
$query="select idSala, nr_sala, randuri, locuri from sali";

$qry_result = mysql_query($query) or die(mysql_error());

//Build Result String
echo  "<table border='1'>";
echo  "<tr>";
echo  "<th bgcolor='black' style='color:white'>ID</th>";
echo  "<th bgcolor='black' style='color:white'>Sala</th>";
echo  "<th bgcolor='black' style='color:white'>Randuri</th>";
echo  "<th bgcolor='black' style='color:white'>Locuri</th>";

echo  "</tr>";

while($result=mysql_fetch_object($qry_result)){
    echo "<tr>";
    foreach ($result as  $value) {
        echo "<td> $value</td>";
    }
    echo "<td><a href=''>Edit</a></td>";
    echo "</tr>";
}
//echo json_encode($result);
echo "</table>";




