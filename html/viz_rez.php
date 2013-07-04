<?php
require_once 'config.php';

//build query
$query = "SELECT
          p.nume, p.prenume, p.email, f.titlu, d.data, d.ora,  s.nr_sala, r.locuri, e.tip, l.nr_locuri, e.pret, r.id
        FROM persoane p, filme f, program d, cinema c, rezervare r, reduceri e, locuri_rezervate l, sali s
        WHERE
          c.idCinema=d.idCinema 
          AND f.idFilm=d.idFilm
          AND p.id=r.id_persoana
          AND d.idProgram=r.id_program
          AND r.id=l.id_rezervare
          AND s.idSala=d.idSala
          AND e.idReducere=l.idReducere";

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

$table_content = "";
while ($result = mysql_fetch_object($qry_result)) {
    $table_row = "<tr>";
    foreach ($result as $value) {
        $table_row .= "<td>$value</td>";
    }
    $table_row .= "
            <td><a href=''>Edit</a></td>
        </tr>
    ";
    $table_content .= $table_row;
}
// wtf json serialization is used for?
echo json_encode($result);
$table_suffix = "</table>";

echo $table_prefix . $table_content . $table_suffix;
