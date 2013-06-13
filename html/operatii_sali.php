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

</script>
<script>
    $(document).ready(function(){
    $("#vizualizare").click(function(){
        document.getElementById("table_sali").innerHTML='<tbody><tr><td><label for="sala">Sala: </label></td>' +
            '<td><input type="text" id="sala"></td></tr><tr>' +
            '<td></td><td></td><td><input type="submit" id="vizualizare" value="Vizualizeaza"/></td></tr>'+
            '</tbody>';
        document.getElementById('vizualizare').style.backgroundColor='red';
    if((document.getElementById('sterge').style.backgroundColor='red') && (document.getElementById('inregistrare').style.backgroundColor='red')){
        document.getElementById('sterge').style.backgroundColor='gray';
        document.getElementById('inregistrare').style.backgroundColor='gray';
    }
    });
    $("#inregistrare").click(function(){
        if((document.getElementById('sterge').style.backgroundColor='red') && (document.getElementById('vizualizare').style.backgroundColor='red')){
            document.getElementById('sterge').style.backgroundColor='gray';
            document.getElementById('vizualizare').style.backgroundColor='gray';
        }
    });
    $("#sterge").click(function(){
        document.getElementById("table_sali").innerHTML='<tbody><tr><td><label for="sala">Sala: </label></td>' +
            '<td><input type="text" id="sala"></td></tr><tr>' +
            '<td></td><td></td><td><input type="submit" id="sterge" value="Sterge"/></td></tr>'+
            '</tbody>';
        document.getElementById('sterge').style.backgroundColor='red';

        if((document.getElementById('vizualizare').style.backgroundColor='red') && (document.getElementById('inregistrare').style.backgroundColor='red')){
            document.getElementById('vizualizare').style.backgroundColor='gray';
            document.getElementById('inregistrare').style.backgroundColor='gray';
        }
    });
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
    <li  class="right_menu"><a id="filme" href="operatii_filme.php" >Filme</a></li>
    <li  class="right_menu"><a id="program" href="operatii_program.php" >Programe</a></li>
    <li class="right_menu"><a id="reduceri" href="operatii_reduceri.php">Reduceri</a></li>
    <li id="current" class="right_menu"><a id="sali" href="operatii_sali.php">Sali</a></li>
</ul>
<div style="width: 500px; float:left;">

    <fieldset>
        <legend><a id="inregistrare" href="operatii_sali.php"  style="background-color: red; text-decoration: none; color:black;"><span>Inregistrare sala</span></a>
            <a id="vizualizare" style="background-color: gray;"><span>Vizualizare sala</span></a>
            <a id="sterge" style="background-color: gray;"><span>Stergere sala</span></a></legend>
        <table id="table_sali">
            <tbody>
            <tr><td><label for="sala">Sala: </label></td>
                <td><input type="text" id="sala"></td></tr>
            <tr><td><label for="randuri">Randuri: </label></td>
                <td><input type="text" id="randuri"></td></tr>
            <tr><td><label for="locuri">Locuri: </label></td>
                <td><input type="text" id="locuri"></td></tr>
            <tr> <td><input type="submit" id="button" value="Salveaza"/></td></tr>
            </tbody>
        </table>

    </fieldset>
</div>
</div>
        </div>
</body>
</html>
