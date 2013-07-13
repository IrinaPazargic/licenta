<?php
require_once 'model.php';
require_once 'config.php';


$username = $_POST['username'];
$password = $_POST['password'];

$query="SELECT * FROM users  WHERE username='$username'";
$result = mysql_query($query);
$row=mysql_fetch_assoc($result);
$count=mysql_num_rows($result);

if ($count == 1 && $row['password'] == md5($password)) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("location: administrator.php");
}else if($username == "" && $password == ""){
    echo "Nu ati completat niciun camp";
}else if($username == "" ){
    echo ("Completati campul username!");
}else if ($password == ""){
    echo ("Completati campul password!");
}else {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    echo "Wrong username or password";
}
ob_end_flush();
