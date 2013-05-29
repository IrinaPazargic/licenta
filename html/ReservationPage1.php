<?php
	require_once 'config.php';

    $query="select tip, pret from reduceri where idReducere=1";
    $rez=mysql_query($query);
    $row= mysql_fetch_array($rez);

    $query1="select tip, pret from reduceri where idReducere=2";
    $rez1=mysql_query($query1);
    $row1= mysql_fetch_array($rez1);

    $query2="select tip, pret from reduceri where idReducere=3";
    $rez2=mysql_query($query2);
    $row2= mysql_fetch_array($rez2);

    $query3="select tip, pret from reduceri where idReducere=4";
    $rez3=mysql_query($query3);
    $row3= mysql_fetch_array($rez3);

    $rezervare = detalii_rezervare();

    $_SESSION['rezervare'] = $rezervare;

	function detalii_rezervare(){
		$idProgram=$_GET['idProgram'];
		$query="select
		            f.titlu, p.data, p.ora, c.nume
                from cinemadb.program p, cinemadb.filme f, cinemadb.cinema c
                where p.idFilm=f.idFilm and c.idCinema=p.idCinema and  p.idProgram='" . $idProgram . "'";
		$result=mysql_query($query);
        $row = mysql_fetch_object($result);
        $rezervare = new Rezervare();
        $rezervare->film = $row->titlu . ' ' . $row->data . ' ' . $row->ora;
        $rezervare->cinema = $row->nume;
        return $rezervare;
    }
?>

<html>
<head>
<link href="reservation.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("button").click(function () {
            $("#content").load("ReservationPage2.php");
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
                                            <p><?= $rezervare->film;?></p>
                                            <p>Cinema: <?= $rezervare->cinema;?></p>
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
								<td style="border: 1px solid black;">
								<span id="tip"><?= $row['tip'];?></span>
								</td>
								<td style="border: 1px solid black;">
								<span id="pret"><?= $row['pret'];?></span>
								</td>
								<td style="border: 1px solid black;">
								<select id="nr_bilete">
                                        <option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="1">5</option>
										<option value="2">6</option>
										<option value="3">7</option>
										<option value="4">8</option>
										<option value="3">9</option>
										<option value="4">10</option>	
								</select>
								</td>
							</tr>
								
							<tr>
									<td style="border: 1px solid black;">&nbsp;</td>
								<td style="border: 1px solid black;">
								<?= $row1['tip'];?>
								</td>
								<td style="border: 1px solid black;">
								<?= $row1['pret'];?>
								</td>
								<td style="border: 1px solid black;">
								<select class="numbers">
                                        <option id="none" value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="1">5</option>
										<option value="2">6</option>
										<option value="3">7</option>
										<option value="4">8</option>
										<option value="3">9</option>
										<option value="4">10</option>	
								</select>
								</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;">&nbsp;</td>
								<td style="border: 1px solid black;">
								<?= $row2['tip'];?>
								</td>
								<td style="border: 1px solid black;">
								<?= $row2['pret'];?>
								</td>
								<td style="border: 1px solid black;">
								<select class="numbers">
                                        <option  id="none"  value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="1">5</option>
										<option value="2">6</option>
										<option value="3">7</option>
										<option value="4">8</option>
										<option value="3">9</option>
										<option value="4">10</option>	
								</select>
								</td>
							</tr>
							
							<tr>
									<td style="border: 1px solid black;">&nbsp</td>
								<td style="border: 1px solid black;">
								<?= $row3['tip'];?>
								</td>
								<td style="border: 1px solid black;">
								<?= $row3['pret'];?>
								</td>
								<td style="border: 1px solid black;">
								<select class="numbers">
                                        <option  id="none"  value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="1">5</option>
										<option value="2">6</option>
										<option value="3">7</option>
										<option value="4">8</option>
										<option value="3">9</option>
										<option value="4">10</option>	
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
					<button >
                        <input  style="border-width:0px;" type="image" src="images/NextSeat.jpg" /></button>
				</td>
			</tr>
	</table> 
	</div>
</body>
</html>
