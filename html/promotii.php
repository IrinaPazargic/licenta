
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
	<a class="selectmap" style="background: none;margin-top:10px; float:right; margin-right:5px;" href="locatie.php">
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
	<h3 style="padding-top:10px; padding-left:10px; float:left;"><a href="index.php" style="text-decoration:none;"><strong>Acasa >></strong></a> <strong>Program</strong> </h3>
	<div id="secondNav" class="copyright">
		<span class="icon_hold">
			<img id="images" src="images/home_32.png">
		</span>
		<h3 ><a href="index.php"><strong>Acasa</strong></a></h3>
		<ul>
			<li><a href="mainprogram.php" class="homeLinks">Program</a></li>
			<li><a href="filme.php" class="homeLinks">Filme</a></li>
			<li><a href="promotii.php" class="homeLinks">Promotii</a></li>
			<li><a href="oferte.php" class="homeLinks">Oferte</a></li>
			
		</ul>
		<h3><strong>Cauta in program</strong></h3>
		<div id="searchBody" >
			<form id="searcFilmCategory" method="get" action="program.php" name="searchform">
				<table width="100%" cellspacing="3" cellpadding="3" border="0" style="margin:0 auto">
				<tbody>
				<tr><td style="text-align:left;">Localitatea</td>
					<td style="text-align:left;">
					<select class="textbox" style="width:95px" name="cinemaId">
							<option class="textbox" value="">selecteaza</option>
							<option class="textbox" value="1808">Galati</option>
							<option class="textbox" value="1809">Bucuresti</option>
					</select></td></tr>
				<tr><td style="text-align:left;">Categorie</td>
					<td style="text-align:left;">
					<select class="textbox" style="width:95px" name="cat">
						<option class="textbox" value="">selecteaza</option>
						<option class="textbox" value="2">Actiune</option>
						<option class="textbox" value="3">Animatie</option>
						<option class="textbox" value="4">Aventura</option>
						<option class="textbox" value="5">Comedie</option>
						<option class="textbox" value="6">Crima</option>
						<option class="textbox" value="8">Drama</option>
						<option class="textbox" value="9">Familie</option>
						<option class="textbox" value="10">Fantastic</option>
						<option class="textbox" value="11">Horror</option>
						<option class="textbox" value="12">Istoric</option>
						<option class="textbox" value="13">Mister</option>
						<option class="textbox" value="14">Musical</option>
						<option class="textbox" value="15">Razboi</option>
						<option class="textbox" value="16">Romantic</option>
						<option class="textbox" value="17">SF</option>
						<option class="textbox" value="18">Thriller</option>
						<option class="textbox" value="19">Western</option>
						<option class="textbox" value="20">Documentar</option>
					</select>
						</td></tr>
				<tr><td style="text-align:left;">Titlu</td>
					<td style="text-align:left;">
						<input class="textbox" type="text" value="" style="width:90px" name="titlu" size="11">
					</td></tr>
				<tr><td style="text-align:left;">Data</td>
					<td style="text-align:left;">
					<select class="textbox" style="width:95px" name="zi">
						<option value="28.02">Joi 28.02</option>
						<option value="01.03">Vineri 01.03</option>
						<option value="02.03">Sambata 02.03</option>
						<option value="03.03">Duminica 03.03</option>
						<option value="04.03">Luni 04.03</option>
						<option value="05.03">Marti 05.03</option>
						<option value="06.03">Miercuri 06.03</option>
						<option value="07.03">Joi 07.03</option>
						<option value="08.03">Vineri 08.03</option>
					</select></td></tr>
				<tr><td style="text-align:left;"> </td>
					<td style="text-align:center;">
						<input class="submit" type="submit" value="CAUTA"></td></tr>
				</tbody>
				</table>
			</form>
		</div> <!--searchBody-->
	</div> <!--secondNav-->

	<div id="news" class="copyright">
	<div id="selectCinema">
		Promotia de vara!!!
		<h2>&#34; C. MYCINEMA  ROMÂNIA S.R.L. REGULAMENTUL CAMPANIEI PROMOTIONALE MYCINEMA  &#34;Fii Star de Cinema  si Castiga Premii ca in Filme&#34;</h2>
		<p>PERIOADA CAMPANIEI: 7iulie 	&#45; 31august 2013</p><br/>
		<p>CAPITOLUL 1: ORGANIZATORUL CAMPANIEI</p><br/>
		<p>	1.1 Organizatorul campaniei promotionale &#34;Fii Star de CINEMA si Castiga Premii ca in Filme&#34; este S.C. MYCinema România S.R.L., cu sediul în str. Ana Davila nr. 13, Sector 5, Bucuresti, inregistrata la Registrul Comertului cu nr. J40/16742/2006, cod fiscal RO19123195, numita în continuare ORGANIZATORUL campaniei promotionale.
			1.2 Campania promotionalt se va desfăsura in conformitate cu prevederile prezentului regulament, care se aplica tuturor participantilor. Participarea la campania promotionala reprezinta acordul cu regulile si dispozitiile stabilite in prezentul document. Orice neconformitate cu regulile din partea participantilor indreptateste ORGANIZATORUL sa refuze acordarea premiilor din promotia &#34;Fii Star de Cinema  si Castiga Premii ca in Filme&#34;.
			1.3 ORGANIZATORUL isi rezerva dreptul de a schimba sau a modifica regulile si dispozitiile în orice moment, cu notificarea prealabila a participantilor.
		</p><br/>
		
		<p>CAPITOLUL 2. LOCATIA CAMPANIEI PROMOTIONALE</p><br/>
		<p>	2.1 Campania promotionala se va desfasura in toate cinematografele MYCinema Romania:<br/>
			MYCINEMA GALATI, European Retail Park Galati &#45; Dunarea Mall, etaj 1, Str. Brailei nr. 4, Jud. Galati<br/>
			MYCINEMA BUCURESTI, AFI-PALACE CONTROCENI Mall, etaj 1, Str. Dorobanti , Jud. Ilfov<br/>
			2.2 Numai biletele achizitionate in cinematografele din reteaua MYCINEMA Romania enumerate mai sus sunt valide pentru Campania promotionala &#34;Fii Star de Cinema si Castiga Premii ca in Filme&#34;.
			2.3 Produsele oferite la completarea secventei de campanie pot fi rascumparate si utilizate numai la cinematografele din reteaua MYCinema Romania enumerate mai sus. 
		</p><br/>
	</div><!--selectCinema-->
	</div><!--news-->
</div><!--mainContent-->

<div id="footer" class="copyright">
<h3>Copyright</h3>
</div>
</body>
</html>
