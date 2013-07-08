<?php
require_once 'config.php';

$titlu = $_GET['titlu'];
$data = $_GET['data'];
$ora = $_GET['ora'];

$titlu = mysql_real_escape_string($titlu);
$data = mysql_real_escape_string($data);
$ora = mysql_real_escape_string($ora);

//build query
$query="select f.titlu, p.data, p.ora
        from program p, filme f
        where f.idFilm=p.idFilm
            and f.titlu='$titlu'
            and p.data='$data'
            and p.ora='$ora'";

$qry_result = mysql_query($query) or die(mysql_error());

$content = "
    <table border='1'>
        <tr>
            <th bgcolor='black' style='color:white'>Film</th>
            <th bgcolor='black' style='color:white'>Data</th>
            <th bgcolor='black' style='color:white'>Ora</th>
        </tr>
";

$gasit = false;

// Insert a new row in the table for each rezervation returned
while($row = mysql_fetch_array($qry_result)){
    $gasit = true;
    $content .= "
    <tr>
        <td>$row[titlu]</td>
        <td>$row[data]</td>
        <td>$row[ora]</td>
    </tr>
    ";
}
if ($gasit === true) {
    echo $content .= "</table>";
} else {
    echo "Nu s-a gasit nimic";
}


