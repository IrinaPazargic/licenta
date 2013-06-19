<?php
    require_once'config.php';

    $titlu=$_POST['titlu'];

    $query_cauta="select titlu from filme where titlu='$titlu'";
    $rez=mysql_query($query_cauta);
    $row_cauta=mysql_fetch_array($rez);


?>
<html>
<head>
<link href="administrator.css" rel="stylesheet" type="text/css"/>
<link href="operatii.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        function ajaxFunction(){
            var ajaxRequest;  // The variable that makes Ajax possible!

            try{
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            }catch (e){
                // Internet Explorer Browsers
                try{
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.
            ajaxRequest.onreadystatechange = function(){
                if(ajaxRequest.readyState == 4){
                    var ajaxDisplay = document.getElementById('rezultat');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }
            // Now get the value from user and pass it to
            // server script.
            var titlu = document.getElementById('titlu').value;
            var queryString = "?titlu=" + titlu ;
            ajaxRequest.open("GET", "cauta_film_functii.php" +
                queryString, true);
            ajaxRequest.send(null);
            $("#rezultat").show();


        }

        function deleteMovie(titlu)
        {

            $.ajax(
                {
                    type: "POST",
                    url: "sterge_film.php?titlu="+titlu,
                    dataType: "html",
                    success: function(result)
                    {
                        if(result == "Ok") alert("The comment is successfuly deleted");
                        else alert("The following error is occurred: "+result);
                    }
                });

            $("#rezultat").show();
        }

    </script>


<script>
    $(document).ready(function(){
     //   $("#rezultat").empty();
        $("#rezultat").hide();



    $("#cauta").click(function(){
        $("#rezultat").hide();
        document.getElementById("table_films").innerHTML='<tbody><tr><td><label for="titlu">Titlu: </label></td><td><input type="text" name="titlu" id="titlu"></td></tr>' +
                                                         '<tr><td></td><td></td><td><input type="submit" name="search" onclick="ajaxFunction()" value="Cauta"/></td></tr> </tbody></table>';
         document.getElementById('cauta').style.backgroundColor='red';
        if((document.getElementById('sterge').style.backgroundColor='red') && (document.getElementById('inregistrare').style.backgroundColor='red')){
            document.getElementById('sterge').style.backgroundColor='gray';
            document.getElementById('inregistrare').style.backgroundColor='gray';
        }
    });
    $("#inregistrare").click(function(){
        document.getElementById('inregistrare').style.backgroundColor='red';
        document.getElementById("films").innerHTML='';
        if((document.getElementById('sterge').style.backgroundColor='red') && (document.getElementById('cauta').style.backgroundColor='red') ){
            document.getElementById('sterge').style.backgroundColor='gray';
            document.getElementById('cauta').style.backgroundColor='gray';
        }
    });
        $("#sterge").click(function(){
            $("#rezultat").empty();
            document.getElementById("table_films").innerHTML='<tbody><tr><td><label for="titlu">Titlu: </label></td><td><input type="text"  name="titlu"></td></tr><tr><td></td><td></td><td><input type="submit" id="sterge" onclick="deleteMovie(this.value)" value="Sterge"/></td></tr> </tbody>';
            document.getElementById('sterge').style.backgroundColor='red';

            if((document.getElementById('cauta').style.backgroundColor='red') && ((document.getElementById('inregistrare').style.backgroundColor='red'))){
                document.getElementById('cauta').style.backgroundColor='gray';
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
            <li><a  class="action" href="operatii_filme.php">Operatii</a></li>
            <li><a  id="rezervari" class="action" href="rezervari.php">Rezervari</a></li>
            <li><a class="action" href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <div id="right">
<div id="inserts">
        <ul id="inserts_menu">
            <li id="current"  class="right_menu"><a  id="filme" href="operatii_filme.php">Filme</a></li>
            <li class="right_menu"><a  id="program" href="operatii_program.php">Programe</a></li>
            <li class="right_menu"><a id="reduceri" href="operatii_reduceri.php" >Reduceri</a></li>
            <li  class="right_menu"><a id="sali" href="operatii_sali.php">Sali</a></li>
        </ul>
<div id="films" style="width: 500px; float:left;">

        <fieldset>
            <legend><a id="inregistrare" href="operatii_filme.php" style="background-color: red; text-decoration: none; color:black;" ><span>Inregistrare film</span></a>
                    <a id="cauta" style="background-color: gray;"><span>Cauta Film</span></a>
                    <a id="sterge" style="background-color: gray;" ><span>Sterge Film</span></a></legend>
            <table id="table_films">
                <tbody>
                <form enctype="multipart/form-data" action="filme_functions.php" method="POST">
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
                </form>
                    </tbody>

                </table>

        </fieldset>

    </div>
    <div id="rezultat" style="clear:both;">


   </div>

</div>
</div>
</body>
<html>
