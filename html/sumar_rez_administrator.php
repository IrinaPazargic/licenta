<?php
require_once 'model.php';
require_once 'config.php';

$codRezervare = $_POST['cod'];

$query = "SELECT
            p.nume, p.prenume, p.email, f.titlu, d.data, d.ora, c.nume, s.nr_sala, r.locuri, e.tip, l.nr_locuri, e.pret
          FROM
            persoane p
            INNER JOIN rezervare r ON p.id= r.id_persoana
            INNER JOIN program d ON r.id_program = d.idProgram
            INNER JOIN filme f ON d.idFilm = f.idFilm
            INNER JOIN cinema c ON d.idCinema = c.idCinema
            INNER JOIN locuri_rezervate l ON r.id = l.id_rezervare
            INNER JOIN reduceri e ON l.idReducere = e.idReducere
            INNER JOIN sali s ON d.idSala = s.idSala
          WHERE
            l.id_rezervare = '$codRezervare'";



$rezultat = mysql_query($query);

$row = mysql_fetch_array($rezultat);

$pret = $row['pret'];
var_dump($pret);
$nrBilete = $row['nr_locuri'];
var_dump($nrBilete);
$tipReduceri = $row['tip'];

$pretTotal = $nrBilete * $pret;


?>

<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body style="background-color: #B2C09C">
    <h3>REZERVARE CURENTA</h3>
    <span style="text-align: center;">Biletele pe care le-ati selectat vor fi pastrate pana la 30 de minute inainte de inceperea spectacolului. Dupa aceasta perioada, aceste bilete vor putea fi cumparate de alte persone.Va recomandam sa va ridicati rezervarile cu cel putin 30 de minute inainte de spectacol.</span>
    <div>
        <table style="width: 100%; padding: 3px; border:2px solid white;">
            <tr>
                <td><strong><em>Informatii despre eveniment</em></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td style="width:100px;">Eveniment</td>
                <td><?= $row['data'] ?></td>
                <td> <?= $row['ora'] ?></td>
                <td>Sala: <?= $row['nr_sala'] ?></td>
                <td><strong><?= $row['titlu'] ?></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td style="width:100px;">Amplasament</td>
                <td><?= $row['nume'] ?></td>
            </tr>
            <tr style="padding:3px;">
                <td><strong><em>Informatii despre bilet</em></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td>Eveniment</td>
                <td>Tipul biletului</td>
                <td>Cantitate</td>
                <td>Pret Bilet</td>
            </tr>
        <?php
        ?>
            <tr style="padding:3px;">
                <td></td>
                <td><?= $tipReduceri ?></td>
                <td><?= $nrBilete ?></td>
                <td><?= $pret ?> Lei</td>
            </tr>
            <tr style="padding:3px;">
                <td>Total bilete</td>
                <td></td>
                <td><?= $nrBilete?> </td>
                <td>Total: <?= $pretTotal ?> Lei</td>
            </tr>
            <tr style="padding:3px;">
                <td><strong><em>Informatii despre locuri</em></strong></td>
            </tr style="padding: 3px
            ;">
            <tr style="padding:3px;">
                <td>Eveniment</td>
                <td>Sala</td>
                <td>Locuri(rand_loc)</td>
            </tr>
            <tr style="padding:3px;">
                <td></td>
                <td><?= $row['nr_sala'] ?></td>
                <td><?= $row['locuri'] ?></td>
            </tr>
            <tr style="padding:3px;">
                <td><strong><em>Informatii despre dumneavoastra</em></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td>Nume</td>
                <td><?= $row['prenume'], $row['nume'] ?></td>
            </tr>
            <tr style="padding:3px;">
                <td>E-mail</td>
                <td><?= $row['email'] ?></td>
            </tr>
            <tr style="text-align: right;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Elibereaza" id="submit"></td>
            </tr>
        </table>
    </div>
</body>
</html>
