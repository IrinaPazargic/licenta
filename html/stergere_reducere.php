<?php
require_once 'config.php';

if (!isset($_POST['tip'])) {
    die("Stergeti tipul din program!");
}

$tip = mysql_real_escape_string($_POST['tip']);
mysql_query("DELETE FROM reduceri WHERE tip = '" . $_POST['tip'] . "'") or die(mysql_error());
echo "Stergere realizata cu succes";
