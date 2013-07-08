<?php
require_once 'config.php';

$email = $_GET['email'];
// Escape User Input to help prevent SQL Injection
$email = mysql_real_escape_string($email);

$query="select
          p.nume, p.prenume, p.email, f.titlu, d.data, d.ora,  s.nr_sala, r.locuri, e.tip, l.nr_locuri, e.pret, r.id
        from
          persoane p, filme f, program d, cinema c, rezervare r, reduceri e, locuri_rezervate l, sali s
        where
          c.idCinema = d.idCinema
          and f.idFilm = d.idFilm
          and p.id = r.id_persoana
          and d.idProgram = r.id_program
          and r.id = l.id_rezervare
          and s.idSala = d.idSala
          and e.idReducere = l.idReducere
          and p.email = '$email'";
$qry_result = mysql_query($query) or die(mysql_error());

//Build Result String
$table_prefix = "
    <table border='1'>
        <tr>
            <th bgcolor='black' style='color:white'>Nume</th>
            <th bgcolor='black' style='color:white'>Prenume</th>
            <th bgcolor='black' style='color:white'>Email</th>
            <th bgcolor='black' style='color:white'>Film</th>
            <th bgcolor='black' style='color:white'>Data</th>
            <th bgcolor='black' style='color:white'>Ora</th>
            <th bgcolor='black' style='color:white'>Sala</th>
            <th bgcolor='black' style='color:white'>Locuri</th>
            <th bgcolor='black' style='color:white'>Tip</th>
            <th bgcolor='black' style='color:white'>Pret</th>
            <th bgcolor='black' style='color:white'>Cod Rez</th>
        </tr>
";

// Insert a new row in the table for each rezervation returned
$table_content = "";
while($row = mysql_fetch_array($qry_result)){
    $table_row = "
        <tr>
            <td>$row[nume]</td>
            <td>$row[prenume]</td>
            <td>$row[email]</td>
            <td>$row[titlu]</td>
            <td>$row[data]</td>
            <td>$row[ora]</td>
            <td>$row[nr_sala]</td>
            <td>$row[locuri]</td>
            <td>$row[tip]</td>
            <td>$row[pret]</td>
            <td>$row[id]</td>
        </tr>
    ";
    $table_content .= $table_row;
}
$table_suffix = "</table>";
echo $table_prefix . $table_content . $table_suffix;
