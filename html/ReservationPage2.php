<?php
require_once 'model.php';
require_once 'config.php';

    $query1 = "select imagine, tip_loc from cinemadb.status_seats where idSeats=1";
    $rez1 = mysql_query($query1);
    $row1 = mysql_fetch_assoc($rez1);

    $query2 = "select imagine, tip_loc from cinemadb.status_seats where idSeats=2";
    $rez2 = mysql_query($query2);
    $row2 = mysql_fetch_assoc($rez2);

    $query3 = "select imagine, tip_loc from cinemadb.status_seats where idSeats=3";
    $rez3 = mysql_query($query3);
    $row3 = mysql_fetch_assoc($rez3);

$rezervare = $_SESSION['rezervare'];

$nrLocuriRed1 = $_GET['red1'];
$nrLocuriRed2 = $_GET['red2'];
$nrLocuriRed3 = $_GET['red3'];
$nrLocuriRed4 = $_GET['red4'];

$tipReduceri = $_SESSION['tipReduceri'];

$locuriRed1 = new TipLocuri($tipReduceri['red1']->tip, $nrLocuriRed1, $tipReduceri['red1']->pret);
$locuriRed2 = new TipLocuri($tipReduceri['red2']->tip, $nrLocuriRed2, $tipReduceri['red2']->pret);
$locuriRed3 = new TipLocuri($tipReduceri['red3']->tip, $nrLocuriRed3, $tipReduceri['red3']->pret);
$locuriRed4 = new TipLocuri($tipReduceri['red4']->tip, $nrLocuriRed4, $tipReduceri['red4']->pret);

$locuri = array('red1'=> $locuriRed1, 'red2'=> $locuriRed2, 'red3'=>$locuriRed3, 'red4'=>$locuriRed4);

$rezervare->tipLocuri = $locuri;

$_SESSION['rezervare'] = $rezervare;

//var_dump($_SESSION['rezervare']);

$nrBilete = 0;
$pret = 0;



foreach ($locuri as $key => $value) {
    $nrBilete += $value->nrLocuri;
    foreach ($tipReduceri as $key=>$value){
        $pret =$nrBilete * $value->pret;
    }
}
?>

<html>
<head>
    <link href="reservation.css" rel="stylesheet" type="text/css"/>
    <link href="seat.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
    <script>
        $(document).ready(function () {
            var array = [];
            var original_image= 'url(images/SeatGreen.png)';
            var second_image='url(images/YellowSeat.png)';

            $("button").click(function () {
                var locuri = array.join('|');
                console.log(locuri);
                $("#content").load("detalii_rezervare.php?locuri=" + locuri);
            });


           $(".seat").click(function (event) {
                var id = $(this).attr('id');

               if(event.target.style.backgroundImage=original_image)
                    event.target.style.backgroundImage=second_image;

               if (array.indexOf(id) == -1) {
                    array.push(id);
                } else {
                    array.splice(array.indexOf(id), 1);
                }
                console.log(array);

                if(array.length > <?= $nrBilete?>){
                  array.pop();
                  alert("nr delocuri selectate este mai mare decat nr de bilete");

                }

            });

        });
    </script>

</head>
<body >
<div id="content">
<table cellspacing="0" cellpadding="0" style="width:100%; border-width:0px;">
<tr>
    <td>
        <p>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td valign="top" align="left">
                    <img style="border-width:0px;" src="images/Step1.jpg">
                    <img style="border-width:0px;" src="images/OnStep2.jpg">
                    <img style="border-width:0px;" src="images/Step3.jpg">
                    <img style="border-width:0px;" src="images/Step4.jpg">
                </td>
                <td valign="top" align="right"></td>
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
                        <span>Filmul: <?= $rezervare->film;?></span><br/>
                        <span> Data: <?= $rezervare->data;?></span></br>
                        <span>Ora : <?= $rezervare->ora;?></span></br>
                        <span>Cinematograful: <?= $rezervare->cinema;?></span></br>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div align="center">
                <span>
                    <a href="ReservationPage.php?idProgram=<?php $link = $_GET['idProgram'];
                    echo $link; ?>">
                        <img border="0" src="images/BackButton.jpg"></a>
                </span>
                    <span>
                    <button>
                        <img border="0" src="images/NextButton.jpg"></button>
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
                            <tbody>
                            <tr>
                                <td style="border:1px solid white;" align="center"><span>Bilete </span>
                                </td>
                                <td style="border:1px solid white;" align="center"><span>Pret total </span></td>
                                <td style="border:1px solid white;" align="center"><span>Locuri selectate</span></td>
                            </tr>
                            <tr>
                                <td style="border:1px solid white;" align="center">
                                    <div id="ticket"><?=  $nrBilete;?></div>
                                </td>
                                <td style="border:1px solid white;" align="center">
                                    <div id="pret"> <?= $pret?> Lei</div>
                                </td>
                                <td style="border:1px solid white;" align="center">
                                    <div></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-left:200px;margin-top:20px;">Sala: <?= $rezervare->sala;?></div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        </p>
    </td>
</tr>

<tr>
<td align="left">
<p>
<table style="width:90%; border: 1px solid black; border-collapse:collapse;  color:white; margin:0 auto;">
<tbody>
<tr>
<td>
<div align="center" style="height:600px; width:100%;">
<div align="left" style=" color:black; float:left; height:400px; width:550px; position:relative; margin-left: 240px; margin-top:50px;">
    <span style="position:absolute; top:15; left:7;">1 </span>

    <div id="1_1" class="seat" style="top:10px; left:50px; background-image:url(images/SeatGreen.png);"></div>
    <div id="1_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:80px;" ></div>
    <div id="1_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:110px;"></div>
    <div id="1_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:140px;"></div>
    <div id="1_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:170px;"></div>
    <div id="1_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:330px;"></div>
    <div id="1_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:360px;"></div>
    <div id="1_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:390px;"></div>
    <div id="1_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:420px;"></div>
    <div id="1_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:450px;"></div>
    <div id="1_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:480px;"></div>
    <span style="position:absolute; top:10; right:7;">1 </span>

    <span style="position:absolute; top:45; left:7;">2 </span>
    <div id="2_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:50px;"></div>
    <div id="2_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:80px;"></div>
    <div id="2_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:110px;"></div>
    <div id="2_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:140px;"></div>
    <div id="2_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:170px;"></div>
    <div id="2_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:330px;"></div>
    <div id="2_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:360px;"></div>
    <div id="2_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:390px;"></div>
    <div id="2_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:420px;"></div>
    <div id="2_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:450px;"></div>
    <div id="2_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:480px;"></div>
    <span style="position:absolute; top:45; right:7;">2 </span>

    <span style="position:absolute; top:75; left:7;">3 </span>
    <div id="3_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:50px;"></div>
    <div id="3_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:80px;"></div>
    <div id="3_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:110px;"></div>
    <div id="3_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:140px;"></div>
    <div id="3_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:170px;"></div>
    <div id="3_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:330px;"></div>
    <div id="3_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:360px;"></div>
    <div id="3_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:390px;"></div>
    <div id="3_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:420px;"></div>
    <div id="3_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:450px;"></div>
    <div id="3_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:480px;"></div>
    <span style="position:absolute; top:75; right:7;">3</span>

    <span style="position:absolute; top:105; left:7;">4</span>
    <div id="4_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:50px;"></div>
    <div id="4_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:80px;"></div>
    <div id="4_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:110px;"></div>
    <div id="4_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:140px;"></div>
    <div id="4_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:170px;"></div>
    <div id="4_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:200px;"></div>

    <div id="4_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:300px;"></div>
    <div id="4_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:330px;"></div>
    <div id="4_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:360px;"></div>
    <div id="4_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:390px;"></div>
    <div id="4_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:420px;"></div>
    <div id="4_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:450px;"></div>
    <div id="4_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:480px;"></div>
    <span style="position:absolute; top:105; right:7;">4</span>

    <span style="position:absolute; top:135; left:7;">5</span>

    <div id="5_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:50px;"></div>
    <div id="5_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:80px;"></div>
    <div id="5_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:110px;"></div>
    <div id="5_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:140px;"></div>
    <div id="5_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:170px;"></div>
    <div id="5_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:200px;"></div>

    <div id="5_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:300px;"></div>
    <div id="5_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:330px;"></div>
    <div id="5_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:360px;"></div>
    <div id="5_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:390px;"></div>
    <div id="5_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:420px;"></div>
    <div id="5_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:450px;"></div>
    <div id="5_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:480px;"></div>
    <span style="position:absolute; top:135; right:7;">5</span>

    <span style="position:absolute; top:165; left:7;">6 </span>

    <div id="6_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:50px;"></div>
    <div id="6_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:80px;"></div>
    <div id="6_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:110px;"></div>
    <div id="6_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:140px;"></div>
    <div id="6_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:170px;"></div>
    <div id="6_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:200px;"></div>

    <div id="6_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:300px;"></div>
    <div id="6_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:330px;"></div>
    <div id="6_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:360px;"></div>
    <div id="6_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:390px;"></div>
    <div id="6_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:420px;"></div>
    <div id="6_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:450px;"></div>
    <div id="6_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:480px;"></div>
    <span style="position:absolute; top:165; right:7;">6 </span>

    <span style="position:absolute; top:195; left:7;">7</span>

    <div id="7_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:50px;"></div>
    <div id="7_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:80px;"></div>
    <div id="7_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:110px;"></div>
    <div id="7_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:140px;"></div>
    <div id="7_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:170px;"></div>
    <div id="7_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:200px;"></div>

    <div id="7_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:300px;"></div>
    <div id="7_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:330px;"></div>
    <div id="7_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:360px;"></div>
    <div id="7_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:390px;"></div>
    <div id="7_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:420px;"></div>
    <div id="7_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:450px;"></div>
    <div id="7_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:480px;"></div>
    <span style="position:absolute; top:195; right:7;">7</span>

    <span style="position:absolute; top:225; left:7;">8</span>

    <div id="8_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:50px;"></div>
    <div id="8_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:80px;"></div>
    <div id="8_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:110px;"></div>
    <div id="8_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:140px;"></div>
    <div id="8_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:170px;"></div>
    <div id="8_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:200px;"></div>

    <div id="8_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:300px;"></div>
    <div id="8_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:330px;"></div>
    <div id="8_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:360px;"></div>
    <div id="8_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:390px;"></div>
    <div id="8_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:420px;"></div>
    <div id="8_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:450px;"></div>
    <div id="8_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:480px;"></div>
    <span style="position:absolute; top:225; right:7;">8</span>

    <span style="position:absolute; top:255; left:7;">9</span>

    <div id="9_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:50px;"></div>
    <div id="9_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:80px;"></div>
    <div id="9_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:110px;"></div>
    <div id="9_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:140px;"></div>
    <div id="9_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:170px;"></div>
    <div id="9_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:200px;"></div>

    <div id="9_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:300px;"></div>
    <div id="9_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:330px;"></div>
    <div id="9_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:360px;"></div>
    <div id="9_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:390px;"></div>
    <div id="9_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:420px;"></div>
    <div id="9_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:450px;"></div>
    <div id="9_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:480px;"></div>
    <span style="position:absolute; top:255; right:7;">9</span>

    <span style="position:absolute; top:285; left:7;">10</span>

    <div id="10_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:50px;"></div>
    <div id="10_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:80px;"></div>
    <div id="10_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:110px;"></div>
    <div id="10_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:140px;"></div>
    <div id="10_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:170px;"></div>
    <div id="10_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:200px;"></div>

    <div id="10_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:300px;"></div>
    <div id="10_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:330px;"></div>
    <div id="10_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:360px;"></div>
    <div id="10_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:390px;"></div>
    <div id="10_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:420px;"></div>
    <div id="10_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:450px;"></div>
    <div id="10_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:480px;"></div>
    <span style="position:absolute; top:285; right:7;">10</span>

    <span style="position:absolute; top:315; left:7;">11</span>

    <div id="11_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:50px;"></div>
    <div id="11_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:80px;"></div>
    <div id="11_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:110px;"></div>
    <div id="11_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:140px;"></div>
    <div id="11_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:170px;"></div>
    <div id="11_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:200px;"></div>

    <div id="11_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:300px;"></div>
    <div id="11_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:330px;"></div>
    <div id="11_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:360px;"></div>
    <div id="11_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:390px;"></div>
    <div id="11_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:420px;"></div>
    <div id="11_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:450px;"></div>
    <div id="11_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:480px;"></div>
    <span style="position:absolute; top:315; right:7;">11</span>

    <span style="position:absolute; top:345; left:7;">12</span>

    <div id="12_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:50px;"></div>
    <div id="12_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:80px;"></div>
    <div id="12_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:110px;"></div>
    <div id="12_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:140px;"></div>
    <div id="12_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:170px;"></div>
    <div id="12_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:200px;"></div>

    <div id="12_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:300px;"></div>
    <div id="12_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:330px;"></div>
    <div id="12_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:360px;"></div>
    <div id="12_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:390px;"></div>
    <div id="12_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:420px;"></div>
    <div id="12_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:450px;"></div>
    <div id="12_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:480px;"></div>
    <span style="position:absolute; top:345; right:7;">12</span>
</div>

<div style="width:200px; height:400px; float:right; margin-top:50px; background-color:red; margin-right:100px;">

    <table style="margin-top:100px;">
        <tr>
            <td><img src='<?= $row1['imagine'] ?>'</td>
            <td><?= $row1['tip_loc']?></td>
        </tr>
        <tr>
            <td><img src='<?= $row2['imagine'] ?>'</td>
            <td><?= $row2['tip_loc'] ?></td>
        </tr>
        <tr>
            <td><img src='<?=  $row3['imagine'] ?>'</td>
            <td><?= $row3['tip_loc']?> </td>
        </tr>
    </table>
</div>


</div>
</td>
</tr>

</table>


</div>
</body>
</html>
