<?php
	require_once 'config.php';

	function detalii_rezervare(){
		$idProgram=$_GET['idProgram'];
		$query="select f.titlu, p.data, p.ora, c.nume from cinemadb.program p, cinemadb.filme f, cinemadb.cinema c where p.idFilm=f.idFilm and c.idCinema=p.idCinema and  p.idProgram='".$idProgram."'";
		$result=mysql_query($query);
		while($row=mysql_fetch_object($result)){
			echo ''.$row->titlu.'  '.$row->data.' '. $row->ora.' ';
			echo '<b>Cinematograful:</b> '.$row->nume.'';
		}
	}
?>

<html>
<head>
<link href="reservation.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
</head>
<body>
	<div>
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
										<?php detalii_rezervare();?>
										<span id="movie"><a href=""> </a></span>
										<span id="data"><a href=""> </a></span>
										<span id="ora"><a href=""> </a></span>
										<span id="cinema"><a href=""> </a></span>
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
								Copii 13
								</td>
								<td style="border: 1px solid black;">
								13.00lei
								</td>
								<td style="border: 1px solid black;">
								<select>
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
								Normal16.5
								</td>
								<td style="border: 1px solid black;">
								16.50lei
								</td>
								<td style="border: 1px solid black;">
								<select>
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
								Pensio13.5
								</td>
								<td style="border: 1px solid black;">
								13.50lei
								</td>
								<td style="border: 1px solid black;">
								<select>
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
								Stud13.5
								</td>
								<td style="border: 1px solid black;">
								13.50lei
								</td>
								<td style="border: 1px solid black;">
								<select>
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
				<td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
			</tr>
	
			<tr >
				<td align="right" style="padding-top:10px;">
					<input id="automat" style="border-width:0px; color:transparent;" type="image" src="images/NextNoSeats.jpg"/>
					<input id="manual" style="border-width:0px;" type="image" src="images/NextSeat.jpg"/>
				</td>
			</tr>
	</table> 
	</div>
</body>
</html>