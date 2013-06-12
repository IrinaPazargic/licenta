
<link href="operatii.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $("#vizualizare_rezervare").click(function(){
            $("#rezultat").show();
            var nextPageUrl = "vizualizare_rezervari.php";
            $("#right").load(nextPageUrl);


        });
    });
</script>

<div id="inserts">
    <ul id="inserts_menu">
        <li class="right_menu"><a  id="cauta_rezervare" style="background-color: #d4d4d4;">Cauta rezervare</a></li>
        <li class="right_menu"><a  id="vizualizare_rezervare" style="background-color: #B2C09C;">Vizualizare rezervari</a></li>
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
