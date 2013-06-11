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
        $("#sali").click(function(){
            var nextPageUrl = "operatii_sali.php";
            $("#inserts").load(nextPageUrl);
        });
    });
</script>

<ul id="inserts_menu">
        <li  class="right_menu"><a id="filme" >Filme</a></li>
        <li id="current" class="right_menu"><a id="program" >Programe</a></li>
        <li class="right_menu"><a id="reduceri">Reduceri</a></li>
        <li class="right_menu"><a id="sali">Sali</a></li>
    </ul>
    <div style="width: 500px; float:left;">

        <fieldset>
            <legend><a id="current_a"  style="background-color: gray;"><span>Inregistrare program</span></a>
                <a style="background-color: gray;"><span>Cauta in program</span></a>
                <a style="background-color: gray;"><span>Sterge program</span></a></legend>
            <table>
                <tbody>
                <tr><td><label for="titlu">Titlu: </label></td>
                    <td><input type="text" id="titlu"></td></tr>
                <tr><td><label for="cinema">Cinematograful: </label></td>
                    <td><input type="text" id="cinema"></td></tr>
                <tr><td><label for="data">Data: </label></td>
                    <td><input type="text" id="data"></td></tr>
                <tr><td><label for="ora">ora: </label></td>
                    <td><input type="text" id="ora"></td></tr>
                <tr><td><label for="sala">Sala: </label></td>
                    <td><input type="text" id="sala"></td></tr>
                <tr> <td><input type="submit" id="button" value="Salveaza"/></td></tr>
                </tbody>
            </table>

        </fieldset>
    </div>

