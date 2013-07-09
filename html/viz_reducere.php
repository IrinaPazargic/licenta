<?php
require_once 'config.php';

$query="select idReducere, tip, pret from reduceri order by tip";
$qry_result = mysql_query($query) or die(mysql_error());


$table_prefix = "
    <table border='1'>
        <tr>
            <th bgcolor='black' style='color:white'>TIP</th>
            <th bgcolor='black' style='color:white'>PRET</th>
        </tr>
";
$table_content = "";
while($row=mysql_fetch_array($qry_result)){
    $table_row = "
        <tr>
            <td>
             <span>${row['tip']}</span>
             </td>

            <td>
            <span>${row['pret']}</span>
            </td>
            <td><a id='${row['idReducere']}'>Edit</a></td>
        </tr>
    ";
    $table_content .= $table_row;
}
$table_suffix = "</table>";
echo $table_prefix . $table_content . $table_suffix;




