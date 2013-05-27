
<html>
<body>
<div>
<?php
$con = mysql_connect("localhost", "root", "root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db("cinemadb",$con);
$sql = "SELECT nume from cinema";
$result = mysql_query($sql,$con);

if (!$result){ 
	die ("Database access failed: " . mysql_error());
	}
else{
	echo "ina e tare";
	}
while ($row = mysql_fetch_object($result))
  {

  }

mysql_close($con);
echo "ina e tare";
?> 
</div>
</body>
</html>