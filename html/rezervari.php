<?php
require_once 'model.php';
require_once 'config.php';
?>
<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
    <link href="operatii.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

    });
</script>
</head>
<body>
<div id="content">
    <div>
        <em>MyCinema City</em>
    </div>
    <p><span>Administrator: <?= $_SESSION['username'] ?> </span></p>
<div id="nav" style="clear:right;">
        <ul>
            <li><a id="detalii"> Detalii cont </a></li>

        </ul></div>
<div id="left" style="clear:both">
        <ul>
            <li><a id="inserari" class="action" href="operatii_filme.php">Operatii</a></li>
            <li><a  id="rezervari" class="action" href="rezervari.php">Rezervari</a></li>
            <li><a class="action" href="logout.php">Log Out</a></li>
        </ul>
    </div>
 <div id="right">
<div id="inserts">
    <ul id="inserts_menu">
        <li class="right_menu"><a  id="cauta_rezervare" style="background-color: #d4d4d4;">Cauta rezervare</a></li>
        <li class="right_menu"><a href="vizualizare_rezervari.php"  id="vizualizare_rezervare" style="background-color: #B2C09C;">Vizualizare rezervari</a></li>
    </ul>
    <div id="change" style="width: 500px; float:left;">
        <form action="sumar_rez_administrator.php" method="POST">
        <fieldset>

            <table id="table_rezervari">
                <tbody>
                <tr><td><label for="cod">Codul: </label></td>
                    <td><input type="text" name="cod"></td></tr>
                <tr><td></td>
                    <td></td>
                    <td><input type="submit"  value="Cauta"/></td></tr>
                </tbody>
            </table>

        </fieldset>
        </form>
    </div>

</div>
</div>
</body>
</html>
