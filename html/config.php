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

mysql_connect($host, $user, $pass) or die ("Nu se poate conecta la serverul de baza de date");
mysql_select_db($db) or die("Nu poate selecta baza de date");
