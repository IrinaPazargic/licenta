<?php
require_once 'config.php';
$query="select s.nr_sala, t.nume_tip, t.randuri, t.locuri
        from sali s, tip_sala t
        where t.id=s.idTip";

$qry_result = mysql_query($query) or die(mysql_error());

$table_prefix = "
<table border='1'>
    <tr>
        <th bgcolor='black' style='color:white'>Sala</th>
        <th bgcolor='black' style='color:white'>Tip Sala</th>
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

$table_suffix = "</table>";

echo $table_prefix . $table_content . $table_suffix;




