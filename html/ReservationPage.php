<?php
	require_once 'model.php';
	require_once 'config.php';

    $query1 = "SELECT tip, pret FROM reduceri WHERE idReducere=1";
    $rez1 = mysql_query($query1);
    $row1 = mysql_fetch_array($rez1);

    $query2 = "SELECT tip, pret FROM reduceri WHERE idReducere=2";
    $rez2 = mysql_query($query2);
    $row2 = mysql_fetch_array($rez2);

    $query3 = "SELECT tip, pret FROM reduceri WHERE idReducere=3";
    $rez3 = mysql_query($query3);
    $row3 = mysql_fetch_array($rez3);

    $query4 = "SELECT tip, pret FROM reduceri WHERE idReducere=4";
    $rez4 = mysql_query($query4);
    $row4 = mysql_fetch_array($rez4);

    $tipReduceri = array(
                            'red1' => new TipRedurecere($row1['tip'], $row1['pret']),
                            'red2' => new TipRedurecere($row2['tip'], $row2['pret']),
                            'red3' => new TipRedurecere($row3['tip'], $row3['pret']),
                            'red4' => new TipRedurecere($row4['tip'], $row4['pret'])
                        );





    $rezervare = detalii_rezervare();

    $_SESSION['rezervare'] = $rezervare;

    $_SESSION['tipReduceri'] = $tipReduceri;

	function detalii_rezervare(){
		$idProgram=$_GET['idProgram'];
		$query="select
		            f.titlu, p.data, p.ora, c.nume, s.nr_sala
                from cinemadb.program p, cinemadb.filme f, cinemadb.cinema c, cinemadb.sali s
                where p.idFilm=f.idFilm and c.idCinema=p.idCinema and p.idSala=s.idSala and p.idProgram='" . $idProgram . "'";
		$result=mysql_query($query);
        $row = mysql_fetch_object($result);
        $rezervare = new Rezervare();
        $rezervare->idProgram = $idProgram;

        $rezervare->film = $row->titlu;
        $rezervare->cinema = $row->nume;
        $rezervare->data = $row->data;
        $rezervare->ora=$row->ora;
        $rezervare->sala=$row->nr_sala;

        return $rezervare;
    }


?>

<html>
<head>
<link href="reservation.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#next").click(function () {
            var red1 = $('#redurecere_1 :selected').text();
            var red2 = $('#redurecere_2 :selected').text();
            var red3 = $('#redurecere_3 :selected').text();
            var red4 = $('#redurecere_4 :selected').text();
            var nextPageUrl = "ReservationPage2.php?red1=" + red1 + "&red2=" + red2 + "&red3=" + red3 + "&red4=" + red4;

                if( red1==0 && red2==0 && red3==0 && red4==0 )
                    alert("Nu ati selectat biletele.Va rugam alegeti biletele!");

            else {
                console.log(nextPageUrl);
                $("#content").load(nextPageUrl);
            }

        });
    });
</script>

</head>
<body>


	<div id="content">
	<table cellspacing="0" cellpadding="0" style="width:100%; border-width:0px;">
			<tr>
				<td>
					<p>	
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody>
								<tr>
									<td valign ="top" align="left">
										<img style="border-width:0px;" src="images/Step1.jpg">
										<img style="border-width:0px;" src="images/OnStep2.jpg">
										<img style="border-width:0px;" src="images/Step3.jpg">
										<img style="border-width:0px;" src="images/Step4.jpg">
									</td>
									<td valign="top" align="right"></td>
								</tr>
								<tr>
									<td align="left">
									<span >Selectati biletele</span>
									</td>
								</tr>
								
								<tr>
									<td align="left">
										<div id="results">
                                           <span>Filmul: <?= $rezervare->film;?></span><br/>
                                            <span> Data: <?= $rezervare->data;?></span></br>
                                            <span>Ora : <?= $rezervare->ora;?></span></br>
                                            <span>Cinematograful: <?= $rezervare->cinema;?></span></br>
                                            <span>Sala : <?= $rezervare->sala ?></span>

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
					<table style="width:90%; border: 1px solid black; border-collapse:collapse; background-color:gray; color:white; margin:0 auto;"  >
						<tbody>
							<tr style=" font-size: 12px; text-shadow: 0.01em 0.01em 0.01em #000000;">
								<th style="border: 1px solid black;">
									&nbsp;
								</th>
								<th style=" border: 1px solid black;color: red;font-family: Verdana,Arial,Helvetica,sans-serif;text-shadow: 0.01em 0.01em 0.01em #000000;text-align:left;" >
									Tip
								</th>
								<th style=" border: 1px solid black;color: red;font-family: Verdana,Arial,Helvetica,sans-serif;text-shadow: 0.01em 0.01em 0.01em #000000;text-align:left;" >
									Pret
								</th>
								<th style=" border: 1px solid black;color: red;font-family: Verdana,Arial,Helvetica,sans-serif;text-shadow: 0.01em 0.01em 0.01em #000000;text-align:left;" >
									Cantitate
						   		</th>
				            </tr>
							
							
							<tr>
								<td style="border: 1px solid black;">&nbsp;</td>
								<td id="tip1" style="border: 1px solid black;">
								<span ><?= $row1['tip'] ?></span>
								</td>
								<td id="pret1" style="border: 1px solid black;">
								<span ><?= $row1['pret']?> Lei</span>
								</td>
								<td style="border: 1px solid black;">
								<select id="redurecere_1"  class="numbers">
                                        <option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
								</select>
								</td>
							</tr>
								
							<tr>
							    <td style="border: 1px solid black;">&nbsp;</td>
								<td id="tip2" style="border: 1px solid black;">
								<span><?= $row2['tip'];?></span>
								</td>
								<td id="pret2" style="border: 1px solid black;">
								<span><?= $row2['pret'];?> Lei</span>
								</td>
								<td style="border: 1px solid black;">
								<select  id="redurecere_2" class="numbers">
                                        <option  value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
								</select>
								</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">&nbsp;</td>
								<td id="tip3" style="border: 1px solid black;">
								<span><?= $row3['tip'];?></span>
								</td>
								<td  id="pret3" style="border: 1px solid black;">
								<span><?= $row3['pret'];?> Lei</span>
								</td>
								<td style="border: 1px solid black;">
								<select  id="redurecere_3" class="numbers">
                                        <option  value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
								</select>
								</td>
							</tr>
							
							<tr>
									<td style="border: 1px solid black;">&nbsp</td>
								<td id="tip4" style="border: 1px solid black;">
								<span><?= $row4['tip'];?></span>
								</td>
								<td id="pret4" style="border: 1px solid black;">
								<span><?= $row4['pret'];?> Lei</span>
								</td>
								<td style="border: 1px solid black;">
								<select  id="redurecere_4" class="numbers">
                                        <option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
								</select>
								</td>
							</tr>
							

						</tbody>
					</table>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
			</tr>
	
			<tr >
				<td align="right" style="padding-top:10px;">
					<input id="automat" style="border-width:0px; color:transparent;" type="image" src="images/NextNoSeats.jpg"/>
					<button id="next">
                        <input  style="border-width:0px;" type="image" src="images/NextSeat.jpg" /></button>
				</td>
			</tr>
	</table> 
	</div>
</body>
</html>
