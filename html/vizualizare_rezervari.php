<?php
require_once 'model.php';
require_once 'config.php';


$query="select p.nume, p.prenume, p.email, f.titlu, d.data, d.ora,  s.nr_sala, r.locuri, e.tip, l.nr_locuri, e.pret, r.id
            from persoane p,filme f, program d, cinema c, rezervare r, reduceri e, locuri_rezervate l, sali s
            where c.idCinema=d.idCinema and f.idFilm=d.idFilm and p.id=r.id_persoana
            and d.idProgram=r.id_program and r.id=l.id_rezervare and s.idSala=d.idSala and e.idReducere=l.idReducere and p.email='".$_POST['email']."'";
$rezultat=mysql_query($query);


?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $("#cauta_rezervare").click(function(){
        var nextPageUrl = "rezervari.php";
        $("#right").load(nextPageUrl);
    });
</script>
<div id="inserts">
    <ul id="inserts_menu">
        <li class="right_menu"><a  id="cauta_rezervare" style="background-color:  #B2C09C;">Cauta rezervare</a></li>
        <li class="right_menu"><a  id="vizualizare_rezervare" style="background-color:#d4d4d4;">Vizualizare rezervari</a></li>
    </ul>
    <div id="change" style="width: 500px; float:left;">
            <fieldset>

                <table><tbody>
                    <tr>
                        <td><label for="email">E-mail: </label></td>
                        <td><input type="text" name="email"></td></tr>
                    <tr>
                        <td></td>
                        <td></td><td><input type="submit" name="rezervare"  value="Vizualizare"/></td>
                    </tr> </tbody></table>

            </fieldset>


    </div>
    <div id="rezultat" style="clear:both;">

        <legend>Rezultat</legend><hr>
        <table>
            <tbody>
            <tr><th>Nume</th>
                <th>Prenume</th>
                <th>E-mail</th>
                <th>Telefon</th>
                <th>Titlu</th>
                <th>Data</th>
                <th>Ora</th>
                <th>Tip Bilet</th>
                <th>Pret</th>
                <th>Locuri</th>
                <th>Sala</th>
                <th>Cod</th>
                <th>Pret Total</th>
            </tr>
            <?php $row=mysql_fetch_array($rezultat)?>
                <tr><td><?= $row['nume'] ?> </td>
                    <td><?= $row['prenume'] ?> </td>
                    <td><?= $row['email']?></td>
                    <td><?=  $row['titlu']?> </td>
                    <td><?= $row['data'] ?> </td>
                    <td><?=  $row['ora'] ?> </td>
                    <td><?= $row['tip'] ?> </td>
                    <td><?= $row['pret'] ?> </td>
                    <td><?= $row['locuri'] ?> </td>
                    <td><?= $row ['nr_sala'] ?> </td>
                    <td><?= $row['id'] ?> </td>
                    <td></td>
                </tr>
            <?php ?>
            </tbody>
        </table>

    </div>

 </div>
