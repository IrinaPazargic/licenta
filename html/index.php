<?php 
require_once 'config.php';
		

		$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$tomorrow= mktime(0,0,0,date("m"),date("d") + 1 ,date("Y"));
		$day_after_tomorrow=mktime(0,0,0,date("m"),date("d") + 2 ,date("Y"));
		$other_day= mktime(0,0,0,date("m"),date("d") + 3 ,date("Y"));
		$other_day_1= mktime(0,0,0,date("m"),date("d") + 4 ,date("Y"));
		$other_day_2= mktime(0,0,0,date("m"),date("d") + 5 ,date("Y"));
		$other_day_3= mktime(0,0,0,date("m"),date("d") + 6 ,date("Y"));
	
?>	



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MyCinema</title>

<link href="main.css" rel="stylesheet" type="text/css"/>  
</head>
<body id="feature">
<div id="header">
	<div id="contact" class="copyright">
	<p>Bine ati venit<p>
	<span class="icon_hold">
	<img id="images" src="images/Phone-Icon-cinema.png">
	</span>
	<h4>0236 466 962</h4>
	</div>
<div id="nav" class="copyright">
<ul id="mainNav">
	<li> <a href="noutati.php" id="homeLink">Noutati</a></li>
	<li><a href="despre_noi.php" id="AboutUsLink">Despre Noi</a></li>
	<li> <a href="" id="politicsLink">Politici</a></li>
	<li><a href="preturi.php" id="politicsLink">Preturi</a></li>
	<li><a href="" id="contactUsLink">Contact</a></li>
</ul>
</div>
	<a class="selectmap" style="background: none;margin-top:10px; float:right; margin-right:5px;" href="map.php">
		<img  alt="" src="images/harta.png">
	</a>
</div><!--nav-->
<div id="slideShow">
</div>
<div id="mainContent">
	<form class="form-wrapper cf">
        <input type="text" placeholder="Search here..." required>
        <button type="submit">Search</button>
    </form> 
	<div id="secondNav" class="copyright">
		<span class="icon_hold">
			<img id="images" src="images/home_32.png">
		</span>
		<h3><a href="index.php"><strong>Acasa</strong></a></h3>
		<ul>
			<li><a href="mainprogram.php" class="homeLinks">Program</a></li>
			<li><a href="filme.php" class="homeLinks">Filme</a></li>
			<li><a href="promotii.php" class="homeLinks">Promotii</a></li>
			<li><a href="" class="homeLinks">Oferte</a></li>
			
		</ul>
		<h3><strong>Cauta in program</strong></h3>

	<div id="searchBody" >
		<form id="searcFilmCategory" method="post" action="<?php $PHP_SELF; ?>" name="searchform">
			<table width="100%" cellspacing="3" cellpadding="3" border="0" style="margin:0 auto">
			<tbody>
				<tr><td style="text-align:left;">Localitatea</td>
					<td style="text-align:left;">
					<select class="textbox" style="width:95px" name="loc">
							<option class="textbox" value="">selecteaza</option>
							<option class="textbox" value="'.$row['nume'].'">Galati</option>
							<option class="textbox" value="101">Bucuresti</option>
					</select></td></tr>
				<tr><td style="text-align:left;">Categorie</td>
					<td style="text-align:left;">
					<select class="textbox" style="width:95px" name="cat">
						<option class="textbox" value="">selecteaza</option>
						<option class="textbox" value="actiune">Actiune</option>
						<option class="textbox" value="animatie">Animatie</option>
						<option class="textbox" value="aventura">Aventura</option>
						<option class="textbox" value="comedie">Comedie</option>
						<option class="textbox" value="crima">Crima</option>
						<option class="textbox" value="drama">Drama</option>
						<option class="textbox" value="familie">Familie</option>
						<option class="textbox" value="fantastic">Fantastic</option>
						<option class="textbox" value="horror">Horror</option>
						<option class="textbox" value="istoric">Istoric</option>
						<option class="textbox" value="mister">Mister</option>
						<option class="textbox" value="musical">Musical</option>
						<option class="textbox" value="razboi">Razboi</option>
						<option class="textbox" value="romantic">Romantic</option>
						<option class="textbox" value="sf">SF</option>
						<option class="textbox" value="thriller">Thriller</option>
						<option class="textbox" value="western">Western</option>
						<option class="textbox" value="documentar">Documentar</option>
					</select>
						</td></tr>
				<tr><td style="text-align:left;">Titlu</td>
					<td style="text-align:left;">
						<input class="textbox" type="text" value="" style="width:90px" name="titlu" size="11">
					</td></tr>
				<tr><td style="text-align:left;">Data</td>
					<td style="text-align:left;">
					<select class="textbox" style="width:95px" name="data">
						<option value="<?php echo date("Y/m/d", $today); ?>"> <?php echo  date("Y/m/d", $today); ?></option>
						<option value="<?php echo date("Y/m/d", $tomorrow); ?>"><?php echo  date("Y/m/d", $tomorrow); ?></option>
						<option value="<?php echo date("Y/m/d", $day_after_tomorrow); ?>"><?php echo  date("Y/m/d", $day_after_tomorrow); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day); ?>"><?php echo  date("Y/m/d", $other_day); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day_1); ?>"><?php echo  date("Y/m/d", $other_day_1); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day_2); ?>"><?php echo  date("Y/m/d", $other_day_2); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day_3); ?>"><?php echo  date("Y/m/d", $other_day_3); ?></option>
					</select></td></tr>
				<tr><td style="text-align:left;"> </td>
					<td style="text-align:center;">
						<input class="submit" type="submit" value="CAUTA" name="do"></td></tr>
					
			</tbody>
			</table>
		</form>
		</div>
	</div>
	

	
	<div id="news" class="copyright">
		<span class="icon_hold">
			<img id="image" src="images/newspaper.png">
		</span>
		<h3><strong>Acasa</strong></h3>
		
		<div class="newsList">
			<span class="icon_hold">
				<img id="image" src="images/killing-time-landscape_s.jpg">
			</span>
			<h4 >"Killing Time-digital-IM-18"</h4>
			<p><em>Titlu original:"Killing Time"</em></p>
			<p><strong>Gen: Actiune</strong></p>
			<br/>
			<hr class="copyright">
			<p class="copyright">Regia: Florin Piersic Jr.<br/>In rolurile principale:Cristian Ioan Gutau, Florin Piersic Jr.Doi asasini platiti �si 
			asteapta viitoarea victima �ntr-un apartament gol. Orele se scurg. Tensiunea creste...<br/><a href="" class="detailsLink" >Detalii film</a></p>
		</div>
			<div class="newsList">
			<span class="icon_hold">
				<img id="image" src="images/snitch-landscape_s.jpg">
			</span>
			<h4 >"Capcana-digital-N-15"</h4>
			<p><em>Titlu original:"Snitch"</em></p>
			<p><strong>Gen: Actiune</strong></p>
			<br/>
			<hr class="copyright">
			<p class="copyright">Regia: Ric Roman Waugh<br/>In rolurile principale:Dwayne Johnson, Barry Pepper, Susan Sarandon, Jon Bernthal
				Filmul este inspirat din fapte reale si spune povestea unui tata al carui fiu este acuzat pe nedrept de trafic de droguri, 
				primind astfel o pedeapsa de 10 ani. Disperat sa-si salveze fiul, tatal face un pact cu politia, fiind de acord sa lucreze ca agent sub acoperire 
				�ntr-un cartel de droguri....<br/><a href="" class="detailsLink" >Detalii film</a></p>
		</div>
		

	</div>
	
</div>
<div id="footer" class="copyright">
<h3>Copyright</h3>
</div>

</body>
</html>
