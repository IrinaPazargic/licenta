<?php
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#filme").click(function(){
            var nextPageUrl = "operatii_filme.php";
            $("#inserts").load(nextPageUrl);
        });
        $("#program").click(function(){
            var nextPageUrl = "operatii_program.php";
            $("#inserts").load(nextPageUrl);
        });
        $("#sali").click(function(){
            var nextPageUrl = "operatii_sali.php";
            $("#inserts").load(nextPageUrl);
        });
    });
</script>
<ul id="inserts_menu">
    <li  class="right_menu"><a id="filme" >Filme</a></li>
    <li  class="right_menu"><a id="program">Programe</a></li>
    <li id="current"  class="right_menu"><a  id="program">Reduceri</a></li>
    <li class="right_menu"><a id="sali">Sali</a></li>
</ul>
<div style="width: 500px; float:left;">

    <fieldset>
        <legend><a id="current_a"  style="background-color: gray;"><span>Inregistrare sala</span></a>
            <a style="background-color: gray;"><span>Vizualizare sala</span></a>
            <a style="background-color: gray;"><span>Stergere sala</span></a></legend>
        <table>
            <tbody>
            <tr><td><label for="tip">Tip: </label></td>
                <td><input type="text" id="tip"></td></tr>
            <tr><td><label for="pret">Pret: </label></td>
                <td><input type="text" id="pret"></td></tr>
            <tr> <td><input type="submit" id="button" value="Salveaza"/></td></tr>
            </tbody>
        </table>

    </fieldset>
</div>

