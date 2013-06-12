<?php
    require_once 'model.php';
    require_once 'config.php';

$username=$_POST['username'];
$password=$_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$query="SELECT * FROM users WHERE username='$username' and password='$password'";
$result=mysql_query($query);

$row=mysql_num_rows($result);


if($row==1){

    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    header("location: administrator.php");
}
else {
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
   echo "Wrong password or email";

}
ob_end_flush();

var_dump($_SESSION['username']);
var_dump($_SESSION['password']);
?>