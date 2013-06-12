<?php
?>
<link href="operatii.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#cauta_rezervare").click(function(){

            var nextPageUrl = "rezervari.php";
            $("#inserts").load(nextPageUrl);
        });
        $("#vizualizare_rezervare").click(function(){
            document.getElementById("table_rezervari").innerHTML='<tbody><tr><td><label for="email">E-mail: </label></td><td><input type="text" id="email"></td></tr>'+
                '<tr><td></td><td></td><td><input type="submit" id="cauta" value="Cauta"/></td></tr> </tbody>';
            document.getElementById('vizualizare_rezervare').style.backgroundColor=' #d4d4d4';
            document.getElementById('cauta_rezervare').style.backgroundColor=' #B2C09C';

        });
    });
</script>

<div id="inserts">
    <ul id="inserts_menu">
        <li class="right_menu"><a  id="cauta_rezervare" style="background-color: #d4d4d4;">Cauta rezervare</a></li>
        <li class="right_menu"><a  id="vizualizare_rezervare" style="background-color: #B2C09C;">Vizualizare rezervari</a></li>
    </ul>
    <div style="width: 500px; float:left;">

        <fieldset>

            <table id="table_rezervari">
                <tbody>
                <tr><td><label for="cod">Codul: </label></td>
                    <td><input type="text" id="cod"></td></tr>
                <tr><td></td>
                    <td></td>
                    <td><input type="submit" id="cauta" value="Cauta"/></td></tr>
                </tbody>
            </table>

        </fieldset>
    </div>

</div>
