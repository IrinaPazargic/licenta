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
<link href="seat.css" rel="stylesheet" type="text/css"/>
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
									<span >SELECTATI LOCURILE</span><br/>
									</td>
								</tr>
								
								<tr>
									<td align="left">
									<h3 style="margin-bottom:0px;"><span ><b>Alegerea dumeavoastra curenta</b></span></h3>
									<div id="results">
										<?php detalii_rezervare();?>
									</div>
									</td>
								</tr>
								
								<tr>
									<td>
										<div align="center">
											<span>
												<a href="ReservationPage1.php?idProgram=<?php $link=$_GET['idProgram']; echo $link; ?>">
												<img border="0" src="images/BackButton.jpg"></a>
											</span>
												<span>
												<a href="detalii_rezervare.php">
												<img border="0" src="images/NextButton.jpg"></a>
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
														<td style="border:1px solid white;"  align="center"><span >Bilete </span></td>
														<td  style="border:1px solid white;"  align="center"><span >Pret </span></td>
														<td style="border:1px solid white;"  align="center"><span >Locuri selectate</span></td>
													</tr>
													<tr>
														<td style="border:1px solid white;" align="center"> <div >Irin </div></td>
														<td style="border:1px solid white;" align="center"> <div> </div></td>
														<td style="border:1px solid white;" align="center"> <div> </div> </td>
													</tr>
												</tbody>
											</table>
										<div style="margin-left:200px;margin-top:20px;">Sala 1 </div>
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
					<table style="width:90%; border: 1px solid black; border-collapse:collapse;  color:white; margin:0 auto;"  >
						<tbody>
					<tr>
						<td>
							<div align="center" style="height:600px; width:100%;">
							<div align="left" style="background-color:white; color:black; float:left; height:400px; width:550px; position:relative; margin-left: 240px; margin-top:50px;">
								<span style="position:absolute; top:15; left:7;">1 </span>
									<div id="seat_1_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:50px;"></div>
									<div id="seat_1_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:80px;"></div>
									<div id="seat_1_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:110px;"></div>
									<div id="seat_1_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:140px;"></div>
									<div id="seat_1_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:170px;"></div>
									<div id="seat_1_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:330px;"></div>
									<div id="seat_1_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:360px;"></div>
									<div id="seat_1_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:390px;"></div>
									<div id="seat_1_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:420px;"></div>
									<div id="seat_1_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:450px;"></div>
									<div id="seat_1_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:10px; left:480px;"></div>
									<span style="position:absolute; top:10; right:7;">1 </span>
								<span style="position:absolute; top:45; left:7;">2 </span>
									<div id="seat_2_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:50px;"></div>
									<div id="seat_2_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:80px;"></div>
									<div id="seat_2_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:110px;"></div>
									<div id="seat_2_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:140px;"></div>
									<div id="seat_2_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:170px;"></div>
									<div id="seat_2_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:330px;"></div>
									<div id="seat_2_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:360px;"></div>
									<div id="seat_2_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:390px;"></div>
									<div id="seat_2_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:420px;"></div>
									<div id="seat_2_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:450px;"></div>
									<div id="seat_2_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:40px; left:480px;"></div>
								<span style="position:absolute; top:45; right:7;">2 </span>
								<span style="position:absolute; top:75; left:7;">3 </span>
									<div id="seat_3_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:50px;"></div>
									<div id="seat_3_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:80px;"></div>
									<div id="seat_3_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:110px;"></div>
									<div id="seat_3_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:140px;"></div>
									<div id="seat_3_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:170px;"></div>
									<div id="seat_3_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:330px;"></div>
									<div id="seat_3_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:360px;"></div>
									<div id="seat_3_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:390px;"></div>
									<div id="seat_3_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:420px;"></div>
									<div id="seat_3_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:450px;"></div>
									<div id="seat_3_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:70px; left:480px;"></div>
								<span style="position:absolute; top:75; right:7;">3</span>
								<span style="position:absolute; top:105; left:7;">4</span>
									<div id="seat_4_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:50px;"></div>
									<div id="seat_4_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:80px;"></div>
									<div id="seat_4_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:110px;"></div>
									<div id="seat_4_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:140px;"></div>
									<div id="seat_4_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:170px;"></div>
									<div id="seat_4_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:200px;"></div>
									
									<div id="seat_4_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:300px;"></div>
									<div id="seat_4_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:330px;"></div>
									<div id="seat_4_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:360px;"></div>
									<div id="seat_4_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:390px;"></div>
									<div id="seat_4_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:420px;"></div>
									<div id="seat_4_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:450px;"></div>
									<div id="seat_4_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:100px; left:480px;"></div>
								<span style="position:absolute; top:105; right:7;">4</span>
									
								<span style="position:absolute; top:135; left:7;">5</span>
									<div id="seat_5_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:50px;"></div>
									<div id="seat_5_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:80px;"></div>
									<div id="seat_5_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:110px;"></div>
									<div id="seat_5_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:140px;"></div>
									<div id="seat_5_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:170px;"></div>
									<div id="seat_5_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:200px;"></div>
									
									<div id="seat_5_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:300px;"></div>
									<div id="seat_5_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:330px;"></div>
									<div id="seat_5_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:360px;"></div>
									<div id="seat_5_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:390px;"></div>
									<div id="seat_5_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:420px;"></div>
									<div id="seat_5_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:450px;"></div>
									<div id="seat_5_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:130px; left:480px;"></div>
								<span style="position:absolute; top:135; right:7;">5</span>
								
								<span style="position:absolute; top:165; left:7;">6 </span>
									<div id="seat_6_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:50px;"></div>
									<div id="seat_6_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:80px;"></div>
									<div id="seat_6_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:110px;"></div>
									<div id="seat_6_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:140px;"></div>
									<div id="seat_6_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:170px;"></div>
									<div id="seat_6_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:200px;"></div>
									
									<div id="seat_6_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:300px;"></div>
									<div id="seat_6_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:330px;"></div>
									<div id="seat_6_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:360px;"></div>
									<div id="seat_6_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:390px;"></div>
									<div id="seat_6_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:420px;"></div>
									<div id="seat_6_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:450px;"></div>
									<div id="seat_6_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:160px; left:480px;"></div>
								<span style="position:absolute; top:165; right:7;">6 </span>
								
								<span style="position:absolute; top:195; left:7;">7</span>
									<div id="seat_7_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:50px;"></div>
									<div id="seat_7_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:80px;"></div>
									<div id="seat_7_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:110px;"></div>
									<div id="seat_7_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:140px;"></div>
									<div id="seat_7_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:170px;"></div>
									<div id="seat_7_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:200px;"></div>
									
									<div id="seat_7_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:300px;"></div>
									<div id="seat_7_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:330px;"></div>
									<div id="seat_7_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:360px;"></div>
									<div id="seat_7_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:390px;"></div>
									<div id="seat_7_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:420px;"></div>
									<div id="seat_7_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:450px;"></div>
									<div id="seat_7_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:190px; left:480px;"></div>
								<span style="position:absolute; top:195; right:7;">7</span>
								
								<span style="position:absolute; top:225; left:7;">8</span>
									<div id="seat_8_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:50px;"></div>
									<div id="seat_8_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:80px;"></div>
									<div id="seat_8_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:110px;"></div>
									<div id="seat_8_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:140px;"></div>
									<div id="seat_8_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:170px;"></div>
									<div id="seat_8_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:200px;"></div>
									
									<div id="seat_8_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:300px;"></div>
									<div id="seat_8_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:330px;"></div>
									<div id="seat_8_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:360px;"></div>
									<div id="seat_8_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:390px;"></div>
									<div id="seat_8_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:420px;"></div>
									<div id="seat_8_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:450px;"></div>
									<div id="seat_8_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:220px; left:480px;"></div>
								<span style="position:absolute; top:225; right:7;">8</span>
								
								<span style="position:absolute; top:255; left:7;">9</span>
									<div id="seat_9_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:50px;"></div>
									<div id="seat_9_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:80px;"></div>
									<div id="seat_9_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:110px;"></div>
									<div id="seat_9_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:140px;"></div>
									<div id="seat_9_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:170px;"></div>
									<div id="seat_9_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:200px;"></div>
									
									<div id="seat_9_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:300px;"></div>
									<div id="seat_9_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:330px;"></div>
									<div id="seat_9_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:360px;"></div>
									<div id="seat_9_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:390px;"></div>
									<div id="seat_9_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:420px;"></div>
									<div id="seat_9_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:450px;"></div>
									<div id="seat_9_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:250px; left:480px;"></div>
								<span style="position:absolute; top:255; right:7;">9</span>
								
								<span style="position:absolute; top:285; left:7;">10</span>
									<div id="seat_10_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:50px;"></div>
									<div id="seat_10_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:80px;"></div>
									<div id="seat_10_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:110px;"></div>
									<div id="seat_10_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:140px;"></div>
									<div id="seat_10_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:170px;"></div>
									<div id="seat_10_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:200px;"></div>
									
									<div id="seat_10_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:300px;"></div>
									<div id="seat_10_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:330px;"></div>
									<div id="seat_10_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:360px;"></div>
									<div id="seat_10_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:390px;"></div>
									<div id="seat_10_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:420px;"></div>
									<div id="seat_10_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:450px;"></div>
									<div id="seat_10_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:280px; left:480px;"></div>
								<span style="position:absolute; top:285; right:7;">10</span>
									
								<span style="position:absolute; top:315; left:7;">11</span>
									<div id="seat_11_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:50px;"></div>
									<div id="seat_11_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:80px;"></div>
									<div id="seat_11_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:110px;"></div>
									<div id="seat_11_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:140px;"></div>
									<div id="seat_11_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:170px;"></div>
									<div id="seat_11_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:200px;"></div>
									
									<div id="seat_11_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:300px;"></div>
									<div id="seat_11_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:330px;"></div>
									<div id="seat_11_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:360px;"></div>
									<div id="seat_11_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:390px;"></div>
									<div id="seat_11_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:420px;"></div>
									<div id="seat_11_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:450px;"></div>
									<div id="seat_11_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:310px; left:480px;"></div>
								<span style="position:absolute; top:315; right:7;">11</span>
								
								<span style="position:absolute; top:345; left:7;">12</span>	
									<div id="seat_12_1" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:50px;"></div>
									<div id="seat_12_2" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:80px;"></div>
									<div id="seat_12_3" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:110px;"></div>
									<div id="seat_12_4" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:140px;"></div>
									<div id="seat_12_5" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:170px;"></div>
									<div id="seat_12_6" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:200px;"></div>
									
									<div id="seat_12_7" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:300px;"></div>
									<div id="seat_12_8" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:330px;"></div>
									<div id="seat_12_9" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:360px;"></div>
									<div id="seat_12_10" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:390px;"></div>
									<div id="seat_12_11" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:420px;"></div>
									<div id="seat_12_12" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:450px;"></div>
									<div id="seat_12_13" class="seat" style=" background-image:url(images/SeatGreen.png); top:340px; left:480px;"></div>
								<span style="position:absolute; top:345; right:7;">12</span>									
							</div>
							
							<div  style="width:200px; height:400px; float:right; margin-top:50px; background-color:red; margin-right:100px;">
								<?php 
									require_once 'config.php'; $query="select imagine, tip_loc from cinemadb.status_seats where idSeats=1";
									$rez=mysql_query($query);
									$row=mysql_fetch_assoc($rez);
									 $query1="select imagine, tip_loc from cinemadb.status_seats where idSeats=2";
									 $rez1=mysql_query($query1);
									$row1=mysql_fetch_assoc($rez1);
									 $query2="select imagine, tip_loc from cinemadb.status_seats where idSeats=3";
									 $rez2=mysql_query($query2);
									$row2=mysql_fetch_assoc($rez2);
								echo '<table style="margin-top:100px;">
									<tr>
										<td><img src='.$row['imagine'].'></td>
										<td>'.$row['tip_loc'].'</td>
									</tr>
									<tr>
										<td><img src='.$row1['imagine'].'></td>
										<td>'.$row1['tip_loc'].'</td>
									</tr>
									<tr>
										<td><img src='.$row2['imagine'].'></td>
										<td>'.$row2['tip_loc'].'</td>
									</tr>
								</table>';
								
							?>
							</div>
				
							
					</div>
				</td>
				
						
			</tr>
			<tr >
				<td align="right" style="padding-top:10px;">
					<input id="automat" style="border-width:0px; color:transparent;" type="image" src="images/BackButton.jpg"/>
					<a href="ReservationPage2.php"><input id="manual" style="border-width:0px;" type="image" src="images/NextButton.jpg"/></a>
				</td>
			</tr>
	</table> 
	

	</div>
</body>
</html>