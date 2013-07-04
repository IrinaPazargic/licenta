<?php
require_once 'config.php';
$query="select idSala, nr_sala, randuri, locuri from sali";
$qry_result = mysql_query($query) or die(mysql_error());

$table_prefix = "
<table border='1'>
    <tr>
        <th bgcolor='black' style='color:white'>ID</th>
        <th bgcolor='black' style='color:white'>Sala</th>
        <th bgcolor='black' style='color:white'>Randuri</th>
        <th bgcolor='black' style='color:white'>Locuri</th>
    </tr>
";

$table_content = "";
while($result=mysql_fetch_object($qry_result)){
    $table_row = "<tr>";
    foreach ($result as  $value) {
        $table_row = "$table_row<td>$value</td>";
    }
    $table_row = "$table_row<td><a href=''>Edit</a></td>";
    $table_row = "$table_row</tr>";
    $table_content = "$table_content$table_row";
}
//echo json_encode($result);
$table_suffix = "</table>";

echo $table_prefix . $table_content . $table_suffix;




