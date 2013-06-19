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
$tip = $_GET['tip'];
// Escape User Input to help prevent SQL Injection
$tip = mysql_real_escape_string($tip);

//build query
$query="select tip, pret from reduceri where tip='$tip'";

$qry_result = mysql_query($query) or die(mysql_error());

//Build Result String
echo  "<table border='1'>";
echo  "<tr>";
echo  "<th bgcolor='black' style='color:white'>Tip</th>";
echo  "<th bgcolor='black' style='color:white'>Pret</th>";
echo  "</tr>";

// Insert a new row in the table for each rezervation returned
while($row = mysql_fetch_assoc($qry_result)){

    echo "<tr>";
    echo "<td>$row[tip]</td>";
    echo "<td>$row[pret]</td>";
    echo  "</tr>";

}
echo "</table>";

