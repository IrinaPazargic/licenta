<?php
    require_once 'model.php';
    require_once 'config.php';
session_destroy();
header("Location:login.php");