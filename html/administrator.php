<?php
    require_once 'model.php';
    require_once 'config.php';
?>

<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
    <link href="inserari.css" rel="stylesheet" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
     $(document).ready(function(){
         $("#inserari").click(function(){
             var nextPageUrl = "inserari.php";
             $("#right").load(nextPageUrl);
         });
     });
    </script>
</head>
<body>
<div id="content">
    <div>
        <em>MyCinema City</em>
    </div>
    <p><span>Administrator: </span></p>
    <div id="nav" style="clear:right;">
        <ul>
            <li><a href=""> Detalii cont </a></li>
        </ul></div>
    <div id="left" style="clear:both">
        <ul>
            <li><a id="inserari" class="action">Inregistrari</a></li>
            <li><a class="action" href="">Stergeri</a></li>
            <li><a class="action" href="">Rezervari</a></li>
            <li><a class="action" href="">Log Out</a></li>
        </ul>
    </div>
    <div id="right">
        <h3>Last activity</h3>
    </div>
</div>
</body>
</html>