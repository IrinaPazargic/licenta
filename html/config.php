<?php
session_start();

class DbConfig
{
    public static $host = "localhost";
    public static $user = "root";
    public static $pass = "root";
    public static $db = "cinemadb";
}

$host=DbConfig::$host;
$user=DbConfig::$user;
$pass=DbConfig::$pass;
$db=DbConfig::$db;

mysql_connect($host, $user, $pass) or die ("nu se poate conecta");
mysql_select_db($db) or die("nu poate intra in baza de date");
