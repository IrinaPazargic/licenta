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

            $("#next").click(function (event) {
                event.preventDefault();
                var values = "call=insert";
                $.ajax({
                    url: "inregistrare_sala.php?",
                    type: "post",
                    data: values,
                    success: function (result) {
                        console.log("Success");
                        $("#result").html(result);
                    },
                    error: function (error) {
                        console.error("Failure");
                        $("#result").html('there is error while submit');
                    }
                });
            });

        $("#vizualizare").click(function(){
        $('#rezultat').hide();
        $(function (){

            $.ajax({ //Make the Ajax Request
                type: "GET",
                url: "viz_sali.php", //file name
                data: "",
                // datatype: 'json',
                success: function(data){

                    $('#forms_div').html(data);

                }
            });

        });
       // document.getElementById("table_sali").innerHTML='';
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
        document.getElementById("forms_div").innerHTML='<form id="form_sterge" action="sterge_sala.php" method="POST">' +
            '<table id="table_sali"><tbody><tr><td><label for="sala">Sala: </label></td>' +
            '<td><input type="text" name="nr_sala" id="nr_sala"></td></tr><tr>' +
            '<td></td><td></td><td><input type="submit" id="sub_sterge" onclick="deleteSala()" value="Sterge"/></td></tr></tbody></table></form>'+
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
        <div id="forms_div">
         <form>
        <table id="table_sali">
            <tbody>
            <tr><td><label for="sala">Sala: </label></td>
                <td><input type="text" name="nr_sala" id="nr_sala"></td></tr>
            <tr><td><label for="randuri">Randuri: </label></td>
                <td><input type="text" name="randuri" id="randuri"></td></tr>
            <tr><td><label for="locuri">Locuri: </label></td>
                <td><input type="text" id="locuri" name="locuri"></td></tr>
            <tr> <td><input type="submit"  id="next" value="Salveaza"/></td></tr>
            </tbody>
        </table>
            </form>
          </div>
    </fieldset>
</div>
            <div id="result" style="clear:both">
                </div>
</div>
        </div>
</body>
</html>
