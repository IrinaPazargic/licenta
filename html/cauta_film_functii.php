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
// Escape User Input to help prevent SQL Injection
$titlu = mysql_real_escape_string($titlu);

//build query
$query="select titlu, gen, an, timp_desf, descriere, regia, roluri_principale from filme where titlu='".$titlu."'";

$qry_result = mysql_query($query) or die(mysql_error());

//Build Result String
echo  "<table border='1'>";
echo  "<tr>";
echo  "<th bgcolor='black' style='color:white'>Film</th>";
echo  "<th bgcolor='black' style='color:white'>Gen</th>";
echo  "<th bgcolor='black' style='color:white'>Anul Aparitiei</th>";
echo  "<th bgcolor='black' style='color:white'>Durata</th>";
echo  "<th bgcolor='black' style='color:white'>Descriere</th>";
echo  "<th bgcolor='black' style='color:white'>Regia</th>";
echo  "<th bgcolor='black' style='color:white'>Roluri Principale</th>";
echo  "</tr>";

// Insert a new row in the table for each rezervation returned
while($row = mysql_fetch_array($qry_result)){

    echo "<tr>";
    echo "<td>$row[titlu]</td>";
    echo "<td>$row[gen]</td>";
    echo "<td>$row[an]</td>";
    echo "<td>$row[timp_desf]</td>";
    echo "<td>$row[descriere]</td>";
    echo "<td>$row[regia]</td>";
    echo "<td>$row[roluri_principale]</td>";
    echo  "</tr>";

}
echo "</table>";

