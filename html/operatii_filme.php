<?php
    require_once'config.php';

    $titlu=$_POST['titlu'];

    $query_cauta="select titlu from filme where titlu='$titlu'";
    $rez=mysql_query($query_cauta);
    $row_cauta=mysql_fetch_array($rez);


?>

<link href="operatii.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#rezultat").hide();
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
<script>
    $("#cauta").click(function(){
        $("#rezultat").show();
        document.getElementById("table_films").innerHTML= '<tbody><tr><td><label for="titlu">Titlu: </label></td><td><input type="text" id="titlu"></td></tr>' +
                                                         '<tr><td></td><td></td><td><input type="submit" name="cauta" value="Cauta"/></td></tr> </tbody>';
         document.getElementById('cauta').style.backgroundColor='red';
        if((document.getElementById('sterge').style.backgroundColor='red') && (document.getElementById('inregistrare').style.backgroundColor='red')){
            document.getElementById('sterge').style.backgroundColor='gray';
            document.getElementById('inregistrare').style.backgroundColor='gray';
        }
    });
    $("#inregistrare").click(function(){
        $("#inserts").load("operatii_filme.php");
        document.getElementById('inregistrare').style.backgroundColor='red';
        if((document.getElementById('sterge').style.backgroundColor='red') && (document.getElementById('cauta').style.backgroundColor='red') ){
            document.getElementById('sterge').style.backgroundColor='gray';
            document.getElementById('cauta').style.backgroundColor='gray';
        }
    });
    $("#sterge").click(function(){
        $("#rezultat").hide();
        document.getElementById("table_films").innerHTML='<tbody><tr><td><label for="titlu">Titlu: </label></td><td><input type="text" id="titlu"></td></tr><tr><td></td><td></td><td><input type="submit" id="sterge" value="Sterge"/></td></tr> </tbody>';
        document.getElementById('sterge').style.backgroundColor='red';

        if((document.getElementById('cauta').style.backgroundColor='red') && ((document.getElementById('inregistrare').style.backgroundColor='red'))){
            document.getElementById('cauta').style.backgroundColor='gray';
            document.getElementById('inregistrare').style.backgroundColor='gray';
        }
    });

</script>
<div id="inserts">
        <ul id="inserts_menu">
            <li id="current"  class="right_menu"><a  id="filme">Filme</a></li>
            <li class="right_menu"><a  id="program">Programe</a></li>
            <li class="right_menu"><a id="reduceri" >Reduceri</a></li>
            <li  class="right_menu"><a id="sali">Sali</a></li>
        </ul>
<div id="films" style="width: 500px; float:left;">
        <form enctype="multipart/form-data" action="filme_functions.php" method="POST">
        <fieldset>
            <legend><a id="inregistrare" style="background-color: red;" ><span>Inregistrare film</span></a>
                    <a id="cauta" style="background-color: gray;"><span>Cauta Film</span></a>
                    <a id="sterge" style="background-color: gray;" ><span>Sterge Film</span></a></legend>
            <table id="table_films">
                <tbody>
                <tr><td><label for="titlu">Titlu: </label></td>
                    <td><input type="text" name="titlu" required=""></td></tr>
                <tr><td><label for="gen">Gen: </label></td>
                    <td><input type="text" name="gen" required=""></td></tr>
                <tr><td><label for="an">Anul aparitiei: </label></td>
                    <td><input type="text" name="an" required=""></td></tr>
                <tr><td><label for="timp_desf">Durata: </label></td>
                    <td><input type="text" name="timp_desf" required=""></td></tr>
                <tr><td><label for="descriere">Descriere: </label></td>
                   <td><textarea rows="4" cols="30" name="descriere" required="">
                   </textarea></td></tr>
                <tr><td><label for="regia">Regia: </label></td>
                   <td> <input type="text" name="Regia" required=""></td></tr>
                <tr><td> <input type="hidden" name="MAX_FILE_SIZE" value="100000" /></td></tr>
                <tr> <td><label for="uploadedfile">Imagine: </label></td>
                    <td><input type="file" name="uploadedfile" required=""></td></tr>
                 <tr><td><label for="roluri_principale">Roluri principale: </label></td>
                    <td><input type="text" name="roluri_principale" required=""></td></tr>
                <tr><td></td>
                    <td></td>
                    <td><input type="submit" name="salveaza" value="Salveaza"/></td></tr>
                    </tbody>
                </table>

        </fieldset>
            </form>
    </div>
    <div id="rezultat" style="clear:both;">

        <legend>Rezultat</legend><hr>
        <table ><tbody>
        <tr >
            <th>Titlu</th>
            <th>Gen</th>
            <th>Anul aparitiei</th>
            <th>Durata</th>
            <th>Descriere</th>
            <th>Regia</th>
            <th>Roluri Principale</th>
        </tr>
         <tr>
             <td><?= $row_cauta['titlu'] ?></td>
             <td><?= $row_cauta['gen'] ?></td>
             <td><?= $row_cauta['an'] ?></td>
             <td><?= $row_cauta['durata'] ?></td>
             <td><?= $row_cauta['descriere'] ?></td>
             <td><?= $row_cauta['regia'] ?></td>
             <td><?= $row_cauta['roluri_principale'] ?></td>
         </tr><tbody></table>

   </div>

</div>
