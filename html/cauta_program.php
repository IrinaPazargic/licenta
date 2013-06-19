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
$titlu = $_GET['titlu'];
$data = $_GET['data'];
$ora = $_GET['ora'];
// Escape User Input to help prevent SQL Injection
$titlu = mysql_real_escape_string($titlu);
$ora = mysql_real_escape_string($ora);

//build query
$query="select f.titlu, p.data, p.ora from program p, filme f where f.idFilm=p.idFilm and f.titlu='$titlu' and p.data='$data' and p.ora='$ora'";

$qry_result = mysql_query($query) or die(mysql_error());

//Build Result String
echo  "<table border='1'>";
echo  "<tr>";
echo  "<th bgcolor='black' style='color:white'>Film</th>";
echo  "<th bgcolor='black' style='color:white'>Data</th>";
echo  "<th bgcolor='black' style='color:white'>Ora</th>";
echo  "</tr>";

// Insert a new row in the table for each rezervation returned
while($row = mysql_fetch_array($qry_result)){
    echo "<tr>";
    echo "<td>$row[titlu]</td>";
    echo "<td>$row[data]</td>";
    echo "<td>$row[ora]</td>";
    echo  "</tr>";

echo "</table>";
}

