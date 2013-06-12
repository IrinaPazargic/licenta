<?php
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#filme").click(function(){
            var nextPageUrl = "operatii_filme.php";
            $("#inserts").load(nextPageUrl);
        });
        $("#reduceri").click(function(){
            var nextPageUrl = "operatii_reduceri.php";
            $("#inserts").load(nextPageUrl);
        });
        $("#program").click(function(){
            var nextPageUrl = "operatii_program.php";
            $("#inserts").load(nextPageUrl);
        });
    });
</script>
<script>
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
        ("#inserts").load("operatii_sali.php");
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
</script>


<ul id="inserts_menu">
    <li  class="right_menu"><a id="filme" >Filme</a></li>
    <li  class="right_menu"><a id="program"  >Programe</a></li>
    <li class="right_menu"><a id="reduceri">Reduceri</a></li>
    <li id="current" class="right_menu"><a id="sali">Sali</a></li>
</ul>
<div style="width: 500px; float:left;">

    <fieldset>
        <legend><a id="inregistrare"  style="background-color: red;"><span>Inregistrare sala</span></a>
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

