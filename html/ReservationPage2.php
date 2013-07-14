<?php
require_once 'model.php';
require_once 'config.php';

$query = "SELECT imagine, tip_loc FROM status_seats";
$result = mysql_query($query);

$rezervare = $_SESSION['rezervare'];

$nrLocuriRed = array();
foreach ($_GET as $key => $value) {
    if (strpos($key, "red", 0) === 0) {
        $nrLocuriRed[$key] = $value;
    }
}

$tipReduceri = $_SESSION['tipReduceri'];
$locuri = array();
$idx = 0;
foreach ($nrLocuriRed as $nrLocRed) {
    $redIdx = 'red' . ++$idx;
    $locuriRed = new TipLocuri($tipReduceri[$redIdx]->tip, $nrLocRed, $tipReduceri[$redIdx]->pret);
    $locuri[$redIdx] = $locuriRed;
}

$rezervare->tipLocuri = $locuri;


$_SESSION['rezervare'] = $rezervare;

$idProgram = $rezervare->idProgram;
$link = $idProgram;

$nrBilete = 0;
$pret = 0;

foreach ($locuri as $key => $value) {
    $nrBilete += $value->nrLocuri;
    foreach ($tipReduceri as $key => $value) {
        $pret = $nrBilete * $value->pret;
    }
}
?>

   <link href="reservation.css" rel="stylesheet" type="text/css"/>
    <link href="seat.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
    <script>
        $(function () {
            var locuri_array = [];

            $("#urmatorul_pas").click(function () {
                var locuri = locuri_array.join('|');
                $("#content").load("detalii_rezervare.php?locuri=" + locuri);
            });

            $(".seat").click(function (event) {
                var conn = window.connection;
                if (!conn) {
                    alert("Your browser doesn't support websocket html5 yet. So you came across the seat was taken " +
                        "while trying to finish reservation. Sorry but your browser is ancient.");
                }
                var id = $(this).attr('id');
                var new_image;

                if (locuri_array.length < <?= $nrBilete;?>) {
                    if (isOriginalImage()) {
                        new_image = "url(http://licenta.irina.ro/" + second_image + ")";
                    } else if (isTakenSeatImage()) {
                        alert ("Locul selectat este deja rezervat");
                        return;
                    } else {
                        new_image = "url(http://licenta.irina.ro/" + original_image + ")";
                    }
                    event.target.style.backgroundImage = new_image;
                    if (locuri_array.indexOf(id) == -1) {
                        locuri_array.push(id);
                    } else {
                        locuri_array.splice(locuri_array.indexOf(id), 1);
                    }
                } else if (locuri_array.length == <?= $nrBilete;?> && isNewImage()) {
                    locuri_array.splice(locuri_array.indexOf(id), 1);
                    new_image = "url(http://licenta.irina.ro/" + original_image + ")";
                    event.target.style.backgroundImage = new_image;
                } else {
                    alert("Numarul de locuri selectate este mai mare decat nr de bilete");
                }
            })
        });
    </script>

<div id="content">
<table cellspacing="0" cellpadding="0" style="width:100%; border-width:0px;">
<tr><td valign="top" align="left">
                    <ul style="float:left; list-style-type: none;">
                        <li>Pasul 1</br>  Alegeti filmul</li>
                        <li>Pasul 2 </br>  Alegeti biletele</li>
                        <li style="color:red;">Pasul 3 </br> Alegeti locurile</li>
                        <li>Pasul 4 </br> Completati formularul</li>
                        <li>Pasul 5 </br>  Confirmare rezervare</li>

                    </ul>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <span>SELECTATI LOCURILE</span><br/>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <h3 style="margin-bottom:0px;"><span><b>Alegerea dumeavoastra curenta</b></span></h3>

                    <div id="results">
                        <span>Filmul: <?= $rezervare->film; ?></span><br/>
                        <span> Data: <?= $rezervare->data; ?></span></br>
                        <span>Ora : <?= $rezervare->ora; ?></span></br>
                        <span>Cinematograful: <?= $rezervare->cinema; ?></span></br>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div align="center">
                        <span>
                                <a href="ReservationPage.php?idProgram=<?= $link ?>">
                                    <button>
                                        <span>Pasul Anterior</span></button>
                                </a>
                </span>
                    <span>
                    <input type="submit" id="urmatorul_pas" value="Urmatorul Pas"/>
                </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding=0;">
                    <div align="center">
                        Va rugam sa selectati locul (locurile) dumneavoastra.
                    </div>
                    <div id="check">
                        <table cellspacing="0" cellpadding="5" border="0" align="center" style="margin-top:10px;">
                            <tr>
                                <td style="border:1px solid white;" align="center"><span>Bilete </span>
                                </td>
                                <td style="border:1px solid white;" align="center"><span>Pret total </span></td>
                            </tr>
                            <tr>
                                <td style="border:1px solid white;" align="center">
                                    <div id="ticket"><?= $nrBilete; ?></div>
                                </td>
                                <td style="border:1px solid white;" align="center">
                                    <div id="pret"> <?= $pret ?> Lei</div>
                                </td>
                            </tr>
                        </table>
                        <div style="margin-left:200px;margin-top:20px;">Sala: <?= $rezervare->sala; ?></div>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
<td align="left">
<p>
<table style="width:90%; border: 1px solid black; border-collapse:collapse;  color:white; margin:0 auto;">
<tr>
<td>
<div align="center" style="height:600px; width:100%;">

    <div align="center" style="height:600px; width:100%;">
    <div align="left"
         style=" color:black; float:left; height:400px; width:550px; position:relative; margin-left: 240px; margin-top:50px;">
    <span style="position:absolute; top:15; left:7;">1 </span>

    <?php

        $topPosition = 10;
        for ($rand = 1; $rand <= 12; $rand++) {
            $leftPosition = 50;
            for ($loc = 1; $loc <= 14; $loc++) {
                $scaun = $rand . '_' . $loc;
                echo "idProgram: " . $_GET['idProgram'];
                $imagine = imagineaInFunctieDeInformatiaDeRezervare($scaun, $idProgram);
                $esteCuloar = esteCuloar($rand, $loc);
                $visibility = $esteCuloar ? "hidden" : "visible";
                echo "
                    <div id='${scaun}' class='seat'
                     style='visibility:${visibility}; top:${topPosition}px; left:${leftPosition}px;
                      background-image:url(${imagine});'></div>
                    <br/>
                ";
                $leftPosition = $leftPosition + 30;
            }
            $topPosition =+ $topPosition + 30;
        }

        function imagineaInFunctieDeInformatiaDeRezervare($scaun, $idProgram)
        {
            $query = "select id from rezervare where INSTR(locuri, '${scaun}') > 0 and id_program = ${idProgram}";
            echo "query: " . $query;
            $result = mysql_query($query);
            $numberOfRows = mysql_num_rows($result);
            if (!$numberOfRows) {
                // inca nu stiu ce sa fac, chestia asta este pe server. Solutia temp este ca afisam ca locul este
                // disponibil.
                return 'images/SeatGreen.png';
            } else if ($numberOfRows > 0) {
                return 'images/GraySeat.png';
            } else {
                return 'images/SeatGreen.png';
            }
        }

        function esteCuloar($rand, $loc)
        {
            if (($rand === 1 || $rand === 2 || $rand === 3) &&
                ($loc === 6 || $loc === 7 || $loc === 6 || $loc === 8 || $loc === 9)
            ) {
                return true;
            }
            return false;
        }

        ?>

        <span style="position:absolute; top:345; right:7;">12</span>
    </div>

    <div style="width:200px; height:400px; float:right; margin-top:50px;margin-right:100px;">

        <table style="margin-top:100px;">
            <?php while ($row = mysql_fetch_array($result)) : ?>
                <tr>
                    <td><img src='<?= $row['imagine'] ?>'</td>
                    <td><?= $row['tip_loc'] ?></td>
                </tr>
            <?php endwhile; ?>

        </table>
    </div>

</div>
</td>
</tr>
</table>
</div>
