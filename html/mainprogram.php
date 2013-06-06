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
>
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
			<li> <a href="politici.php" id="politicsLink">Politici</a></li>
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
						<option value="<?php echo date("Y/m/d", $today); ?>"> <?php echo  date("Y/m/d", $today); ?></option>
						<option value="<?php echo date("Y/m/d", $tomorrow); ?>"><?php echo  date("Y/m/d", $tomorrow); ?></option>
						<option value="<?php echo date("Y/m/d", $day_after_tomorrow); ?>"><?php echo date("Y/m/d", $day_after_tomorrow); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day); ?>"><?php echo date("Y/m/d", $other_day); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day_1); ?>"><?php echo date("Y/m/d", $other_day_1); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day_2); ?>"><?php echo date("Y/m/d", $other_day_2); ?></option>
						<option value="<?php echo date("Y/m/d", $other_day_3); ?>"><?php echo date("Y/m/d", $other_day_3); ?></option>
					</select></td></tr>
				<tr><td style="text-align:left;"> </td>
					<td style="text-align:center;">
						<input class="submit" type="submit" value="CAUTA"></td></tr>
				</tbody>
				</table>
			</form>
		</div> <!--searchBody-->
	</div> <!--secondNav-->

    <div id="news">
       	<div id="selectCinema">

       		<h2 style="background-color: orange; text-align: center;"> Rezervarile trebuie ridicate cu cel putin 30 minute inainte de inceperea filmului, in caz contrar vor fi anulate.<br/>
       			Pentru a evita aglomeratia de la case, va rugam sa ridicati rezervarile anticipat.</h2>
       		<h3> <strong>Selectati cinematograful:</strong></h3>
       		<table style="width:100%">
       		<tbody>
       			<tr>
                     <td style="text-align:left;width:200px;  padding: 5px;">
       				    <a href="program.php?idCinema=100" style="width: 150px; font-size:1.3em; text-decoration:none;text-transform: uppercase; border:1px solid black;"><strong>Galati</strong></a></td></tr>
       			<tr>
                    <td style="text-align:left; width:100px; padding: 5px; ">
       				    <a href="program.php?idCinema=101" style="width: 150px; font-size:1.3em; text-decoration: none; text-transform: uppercase; border:1px solid black; "><strong>Bucuresti</strong></a></td></tr>
       		</tbody>
       		</table>
       	</div><!--selectCinema-->
       	</div><!--news-->
    <div id="thirdNav" class="copyright">
		<span class="icon_hold">
			<img class="images" src="images/ico_promo.gif">
		</span>
        <h3><strong>Categorii Filme</strong></h3>
        <ul id="film_list">
            <li ><a href="filme.php?gen=actiune" class="filmsLink">Actiune</a></li>
            <li><a href="filme.php?gen=animatie" class="filmsLink">Animatie</a></li>
            <li><a href="filme.php?gen=aventura" class="filmsLink">Aventura</a></li>
            <li><a href="filme.php?gen=comedie" class="filmsLink">Comedie</a></li>
            <li><a href="filme.php?gen=crima" class="filmsLink">Crima</a></li>
            <li><a href="filme.php?gen=drama" class="filmsLink">Drama</a></li>
            <li><a href="filme.php?gen=familie" class="filmsLink">Familie</a></li>
            <li><a href="filme.php?gen=fantastic" class="filmsLink">Fantastic</a></li>
            <li><a href="filme.php?gen=horror" class="filmsLink">Horror</a></li>
            <li><a href="filme.php?gen=istoric" class="filmsLink">Istoric</a></li>
            <li><a href="filme.php?gen=mister" class="filmsLink">Mister</a></li>
            <li><a href="filme.php?gen=muzical" class="filmsLink">Muzical</a></li>
            <li><a href="filme.php?gen=razboi" class="filmsLink">Razboi</a></li>
            <li><a href="filme.php?gen=romantic" class="filmsLink">Romantic</a></li>
            <li><a href="filme.php?gen=sf" class="filmsLink">SF</a></li>
            <li><a href="filme.php?gen=thriller" class="filmsLink">Thriller</a></li>
            <li><a href="filme.php?gen=western" class="filmsLink">Western</a></li>
            <li><a href="filme.php?gen=documentar" class="filmsLink">Documentar</a></li>
        </ul>
    </div> <!--thirdNav-->

</div><!--mainContent-->

<div id="footer" class="copyright">
<h3>Copyright</h3>
</div>
</body>
</html>
