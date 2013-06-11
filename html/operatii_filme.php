<?php
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#program").click(function(){
            var nextPageUrl = "operatii_program.php";
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
<div id="inserts">
        <ul id="inserts_menu">
            <li id="current" class="right_menu"><a  id="filme">Filme</a></li>
            <li class="right_menu"><a  id="program">Programe</a></li>
            <li class="right_menu"><a id="reduceri" >Reduceri</a></li>
            <li class="right_menu"><a id="sali">Sali</a></li>
        </ul>
<div style="width: 500px; float:left;">

        <fieldset>
            <legend><a  style="background-color: gray;"><span>Inregistrare film</span></a>
                    <a style="background-color: gray;"><span>Cauta Film</span></a>
                    <a style="background-color: gray;"><span>Sterge Film</span></a></legend>
            <table>
                <tbody>
                <tr><td><label for="titlu">Titlu: </label></td>
                    <td><input type="text" id="titlu"></td></tr>
                <tr><td><label for="gen">Gen: </label></td>
                    <td><input type="text" id="gen"></td></tr>
                <tr><td><label for="an">Anul aparitiei: </label></td>
                    <td><input type="text" id="an"></td></tr>
                <tr><td><label for="timp_desf">Durata: </label></td>
                    <td><input type="text" id="timp_desf"></td></tr>
                <tr><td><label for="descriere">Anul aparitiei: </label></td>
                   <td><textarea rows="4" cols="30">
                   </textarea></td></tr>
                <tr><td><label for="regia">Regia: </label></td>
                   <td> <input type="text" id="Regia"></td></tr>
                <tr> <td><label for="image">Imagine: </label></td>
                    <td><input type="text" id="image"></td>
                    <td><input type="submit" id="button1" value="Upload"/></td></tr>
                 <tr><td><label for="roluri_principale">Roluri principale: </label></td>
                    <td><input type="text" id="roluri_principale"></td></tr>
                <tr><td></td>
                    <td></td>
                    <td><input type="submit" id="button" value="Salveaza"/></td></tr>
                    </tbody>
                </table>

        </fieldset>
    </div>

</div>
