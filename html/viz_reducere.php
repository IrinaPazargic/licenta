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
        <tr class='edit_tr' id=${row['idReducere']}>
            <td class='edit_td'>
             <span id='span_1_${row['idReducere']}' >${row['tip']}</span>
             <input type='text' value='${row['tip']}' class='editbox' id='input_${row['idReducere']}'/>
             </td>

            <td class='edit_td'>
            <span id='span_2_${row['idReducere']}' class='text'>${row['pret']}</span>
            <input type='text' value='${row['pret']}' class='editbox' id='input_${row['idReducere']}'/>
            </td>
            <td><a id='${row['idReducere']}'>Edit</a></td>
        </tr>
    ";
    $table_content .= $table_row;
}
$table_suffix = "</table>";
echo $table_prefix . $table_content . $table_suffix;




