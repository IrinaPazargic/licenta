<?php
    require_once 'model.php';
    require_once 'config.php';
?>

<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
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
            <li><a class="action" href="">Inregistrari</a></li>
            <li><a class="action" href="">Stergeri</a></li>
            <li><a class="action" href="">Rezervari</a></li>
        </ul>
    </div>
    <div id="right">
        <h3>Last activity</h3>
    </div>
</div>
</body>
</html>