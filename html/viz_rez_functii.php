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
$email = $_GET['email'];
	// Escape User Input to help prevent SQL Injection
$email = mysql_real_escape_string($email);

	//build query
$query="select p.nume, p.prenume, p.email, f.titlu, d.data, d.ora,  s.nr_sala, r.locuri, e.tip, l.nr_locuri, e.pret, r.id
            from persoane p,filme f, program d, cinema c, rezervare r, reduceri e, locuri_rezervate l, sali s
            where c.idCinema=d.idCinema and f.idFilm=d.idFilm and p.id=r.id_persoana
            and d.idProgram=r.id_program and r.id=l.id_rezervare and s.idSala=d.idSala and e.idReducere=l.idReducere and p.email='".$email."'";

$qry_result = mysql_query($query) or die(mysql_error());

	//Build Result String
echo  "<table border='1'>";
echo  "<tr>";
echo  "<th bgcolor='black' style='color:white'>Nume</th>";
echo  "<th bgcolor='black' style='color:white'>Prenume</th>";
echo  "<th bgcolor='black' style='color:white'>Email</th>";
echo  "<th bgcolor='black' style='color:white'>Film</th>";
echo  "<th bgcolor='black' style='color:white'>Data</th>";
echo  "<th bgcolor='black' style='color:white'>Ora</th>";
echo  "<th bgcolor='black' style='color:white'>Sala</th>";
echo  "<th bgcolor='black' style='color:white'>Locuri</th>";
echo  "<th bgcolor='black' style='color:white'>Tip</th>";
echo  "<th bgcolor='black' style='color:white'>Pret</th>";
echo  "<th bgcolor='black' style='color:white'>Cod Rez</th>";
echo  "</tr>";

// Insert a new row in the table for each rezervation returned
while($row = mysql_fetch_array($qry_result)){
    echo "<tr>";
    echo "<td>$row[nume]</td>";
    echo "<td>$row[prenume]</td>";
    echo "<td>$row[email]</td>";
    echo "<td>$row[titlu]</td>";
    echo "<td>$row[data]</td>";
    echo "<td>$row[ora]</td>";
    echo "<td>$row[nr_sala]</td>";
    echo "<td>$row[locuri]</td>";
    echo "<td>$row[tip]</td>";
    echo "<td>$row[pret]</td>";
    echo "<td>$row[id]</td>";
    echo  "</tr>";

}
$display_string .= "</table>";
echo $display_string;
