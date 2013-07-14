<?php
require_once 'model.php';
require_once 'config.php';

$rezervare = $_SESSION['rezervare'];
$persoana = new Persoana();
$persoana->nume = $_GET['nume'];
$persoana->prenume = $_GET['prenume'];
$persoana->email = $_GET['email'];
$persoana->telefon = $_GET['telefon'];
$rezervare->persoana = $persoana;

$_SESSION['rezervare'] = $rezervare;

$nrBilete = 0;
$pretBilete = 0;

foreach ($rezervare->tipLocuri as $key => $value) {
    $nrBilete += $value->nrLocuri;
}
foreach ($rezervare->tipLocuri as $key => $value) {
    $pretBilete += $value->pret;
}

?>
    <script>
        $(function () {
            $("#submit").click(function () {
                $("#rezerva").load("rezerva.php");
                var conn = window.connection;
                var data =  {
                                locuri: '<?= $rezervare->locuri ?>'
                            };
                conn.send(JSON.stringify(data));
                conn.close();
            });
        });
    </script>
    <style type="text/css">
        li {
            float: left;
            font-size: 0.8em;
            margin-left: 5px;
            border: 1px solid red;
        }

    </style>
<div id="rezerva">
    <table>
        <tr>
            <td valign="top" align="left">
                <ul style="float:left; list-style-type: none;">
                    <li>Pasul 1</br>  Alegeti filmul</li>
                    <li>Pasul 2 </br>  Alegeti biletele</li>
                    <li>Pasul 3 </br> Alegeti locurile</li>
                    <li>Pasul 4 </br> Completati formularul</li>
                    <li style="color:red;">Pasul 5 </br>  Confirmare rezervare</li>

                </ul>
            </td>
        </tr>
    </table>
    <h3>VERIFICATI COMANDA DUMNEAVOASTRA</h3>
    <span style="text-align: center;">
        Biletele pe care le-ati selectat vor fi pastrate pana la 30 de minute inainte de inceperea spectacolului. Dupa aceasta perioada, aceste bilete vor putea fi cumparate de alte persone.Va recomandam sa va ridicati rezervarile cu cel putin 30 de minute inainte de spectacol.
    </span>

    <div>
        <table style="width: 100%; padding: 3px; border:2px solid white;">

            <tr>
                <td><strong><em>Informatii despre eveniment</em></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td style="width:100px;">Eveniment</td>
                <td><?= $rezervare->data ?></td>
                <td> <?= $rezervare->ora ?></td>
                <td>Sala: <?= $rezervare->sala ?></td>
                <td><strong><?= $rezervare->film ?></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td style="width:100px;">Amplasament</td>
                <td><?= $rezervare->cinema ?></td>
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
            foreach ($rezervare->tipLocuri as $key => $value) :
                if ($value->nrLocuri > 0) :
                    ?>
                    <tr style="padding:3px;">
                        <td></td>
                        <td><?= $value->tip; ?></td>
                        <td><?= $value->nrLocuri; ?></td>
                        <td><?= $value->pret; ?> Lei</td>
                    </tr>
                <?php
                endif;
            endforeach;
            ?>
            <tr style="padding:3px;">
                <td>Total bilete</td>
                <td></td>
                <td><?= $nrBilete ?> </td>
                <td>Total: <?= $pretBilete ?> Lei</td>
            </tr>
            <tr style="padding:3px;">
                <td><strong><em>Informatii despre locuri</em></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td>Eveniment</td>
                <td>Sala</td>
                <td>Locuri(rand_loc)</td>
            </tr>
            <tr style="padding:3px;">
                <td></td>
                <td><?= $rezervare->sala ?></td>
                <td><?= $rezervare->locuri ?></td>
            </tr>
            <tr style="padding:3px;">
                <td><strong><em>Informatii despre dumneavoastra</em></strong></td>
            </tr>
            <tr style="padding:3px;">
                <td>Nume</td>
                <td><?= $persoana->prenume, $persoana->nume ?></td>
            </tr>
            <tr style="padding:3px;">
                <td>E-mail</td>
                <td><?= $persoana->email ?></td>
            </tr>
            <tr style="text-align: right;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Rezerva" id="submit"></td>
            </tr>
        </table>
    </div>
</div>