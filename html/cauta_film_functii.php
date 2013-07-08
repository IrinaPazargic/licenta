<?php
require_once 'config.php';

$titlu = $_GET['titlu'];
$titlu = mysql_real_escape_string($titlu);

$query="SELECT f.titlu, f.an, f.timp_desf, f.descriere, f.regia,f.roluri_principale, g.nume_gen
        FROM filme f, gen_film g
        WHERE f.idGen=g.id
        AND f.titlu='$titlu'";

$qry_result = mysql_query($query) or die(mysql_error());

$table = "<table border='1'>
            <tr>
                 <th bgcolor='black' style='color:white'>Film</th>
                 <th bgcolor='black' style='color:white'>Gen</th>
                 <th bgcolor='black' style='color:white'>Anul Aparitiei</th>
                 <th bgcolor='black' style='color:white'>Durata</th>
                 <th bgcolor='black' style='color:white'>Descriere</th>
                 <th bgcolor='black' style='color:white'>Regia</th>
                 <th bgcolor='black' style='color:white'>Roluri Principale</th>
            </tr>";

while($row = mysql_fetch_array($qry_result)){

   $content = "<tr>
                    <td>$row[titlu]</td>
                    <td>$row[nume_gen]</td>
                    <td>$row[an]</td>
                    <td>$row[timp_desf]</td>
                    <td>$row[descriere]</td>
                    <td>$row[regia]</td>
                    <td>$row[roluri_principale]</td>
                 </tr>";

}
$end = "</table>";
echo $table .$content . $end;

