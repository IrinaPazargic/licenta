<?php 
require_once 'config.php';
		

		$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$tomorrow= mktime(0,0,0,date("m"),date("d") + 1 ,date("Y"));
		$day_after_tomorrow=mktime(0,0,0,date("m"),date("d") + 2 ,date("Y"));
		$other_day= mktime(0,0,0,date("m"),date("d") + 3 ,date("Y"));
		$other_day_1= mktime(0,0,0,date("m"),date("d") + 4 ,date("Y"));
		$other_day_2= mktime(0,0,0,date("m"),date("d") + 5 ,date("Y"));
		$other_day_3= mktime(0,0,0,date("m"),date("d") + 6 ,date("Y"));
	
	
	function filme(){
	$gen=$_GET['gen'];
	$query="select titlu, gen from cinemadb.filme where gen='$gen'";
	$result=mysql_query($query);
	
	while ($row=mysql_fetch_array($result)){
			echo "<p><b>$row[titlu]</b> </p><br/> <em>$row[gen]</em> </br><hr/>";
		}
	
	}
	
	function filme_cinema(){
							$idCinema=$_GET['idCinema'];
		
							
							$query="select p.idProgram, f.titlu, f.gen, p.ora, f.titlu from cinemadb.program p, cinemadb.filme f, cinemadb.cinema c where p.idFilm=f.idFilm and p.idCinema=c.idCinema and c.idCinema='".$idCinema."' and data=CURDATE() ";
							$result = mysql_query($query);
							while ($row = mysql_fetch_array($result))	{
							
								echo '<div class="det_prog"><div class="leadin">';
								echo  '<div class="info" style="width:314px;"><p><b>'.$row['titlu'].'</b></p> <br/><em>'.$row['gen'].'</em><p><br/><a>Detalii Film..</a></p></div>';
								echo '<div class="rez_info" style="width:190px;"><table ><tbody><tr>';
								echo '<td style="padding:0;margin:0;">';
							
										
										echo	'<a class="btn_r" href="ReservationPage1.php?idProgram='.$row['idProgram'].' "  style="cursor:pointer; margin-top:5px;"><span>R </span></a>'.$row['ora'].'';
								
										echo 	'</td>';
									
								echo '</tr></tbody></table></div>';
							echo '</div> </div><hr/>';
						
						}
						
	}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MyCinema</title>
<link href="main.css" rel="stylesheet" type="text/css"/>
<link href="program.css" rel="stylesheet" type="text/css"/>

</head>
<body id="feature">
<div id="header">
	<div id="contact" class="copyright">
		<p>Bine ati venit<p>
		<span class="icon_hold">
		<img id="images" src="images/Phone-Icon-cinema.png">
		</span>
		<h4>0236 466 962</h3>
	</div>
	<div id="nav" class="copyright">
		<ul id="mainNav">
			<li> <a href="" id="homeLink">Noutati</a></li>
			<li><a href="" id="AboutUsLink">Despre Noi</a></li>
			<li> <a href="" id="politicsLink">Politici</a></li>
			<li><a href="" id="politicsLink">Preturi</a></li>
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
	<h3 style="padding-top:10px; padding-left:10px; float:left;"><strong>Acasa >></strong><strong><a href="mainprogram.php" style="text-decoration:none;">Program >></strong></a><strong> Cinematograful Galati</strong></h3>
	<div id="secondNav" class="copyright">
		<span class="icon_hold">
			<img id="images" src="images/home_32.png">
		</span>
		<h3 ><a href="index.html"><strong>Acasa</strong></a></h3>
		<ul>
			<li><a href="mainprogram.php" class="homeLinks">Program</a></li>
			<li><a href="" class="homeLinks">Filme</a></li>
			<li><a href="" class="homeLinks">Rezervare</a></li>
			<li><a href="" class="homeLinks">Oferte</a></li>
			<li><a href="optiuni.html" class="homeLinks">Optiuni</a></li>
			
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
	
	<div id="thirdNav" class="copyright" >
		<span class="icon_hold">
			<img class="images" src="images/ico_promo.gif">
		</span>
		<h3><strong>Categorii Filme</strong></h3>
		<ul id="film_list">
			<li ><a href="?gen=actiune" class="filmsLink">Actiune</a></li>
			<li><a href="?gen=animatie" class="filmsLink">Animatie</a></li>
			<li><a href="?gen=aventura" class="filmsLink">Aventura</a></li>
			<li><a href="?gen=comedie" class="filmsLink">Comedie</a></li>
			<li><a href="?gen=crima" class="filmsLink">Crima</a></li>
			<li><a href="?gen=drama" class="filmsLink">Drama</a></li>
			<li><a href="?gen=familie" class="filmsLink">Familie</a></li>
			<li><a href="?gen=fantastic" class="filmsLink">Fantastic</a></li>
			<li><a href="?gen=horror" class="filmsLink">Horror</a></li>
			<li><a href="?gen=istoric" class="filmsLink">Istoric</a></li>
			<li><a href="?gen=mister" class="filmsLink">Mister</a></li>
			<li><a href="?gen=muzical" class="filmsLink">Muzical</a></li>
			<li><a href="?gen=razboi" class="filmsLink">Razboi</a></li>
			<li><a href="?gen=romantic" class="filmsLink">Romantic</a></li>
			<li><a href="?gen=sf" class="filmsLink">SF</a></li>
			<li><a href="?gen=thriller" class="filmsLink">Thriller</a></li>
			<li><a href="?gen=western" class="filmsLink">Western</a></li>
			<li><a href="?gen=documentar" class="filmsLink">Documentar</a></li>
		</ul>
	</div> <!--thirdNav-->
	<div id="news" class="copyright">
	<div id="program_film">
		
		<h3><strong> Program - Galati </strong></h3>
		<div id="menu_program">
			<ul>
			<li id="current_program">
				<a href=""><span> <?php echo "Sa ".date("Y/m/d", $today); ?> </span></a></li>
			<li>
				<a href=""><span><?php  echo "Du ".date("m/d", $tomorrow); ?> </span></a></li>
			<li>
				<a href=""><span><?php  echo "Lu ".date("m/d", $day_after_tomorrow); ?> </span></a></li>
			<li>
				<a href=""><span><?php  echo "Ma ".date("m/d", $other_day); ?> </span></a></li>
			<li>
				<a href=""><span><?php  echo "Mi ".date("m/d", $other_day_1); ?></span></a></li>
			<li>
				<a href=""><span><?php  echo "Jo ".date("m/d", $other_day_2); ?></span></a></li>
			<li>
				<a href=""><span><?php  echo "Vi ".date("m/d", $other_day_3); ?></span></a></li>
			</ul>
			
		</div>
				
				<?php
					if (isset($_GET['gen'])) 
								$linkchoice=$_GET['gen'];
						else $linkchoice='';

					switch($linkchoice){

					case 'actiune' :
						filme();
						break;
						
					case 'drama' :
						filme();
						break;
						
					case 'comedie' :
						filme();
						break;
						
					case 'familie' :
						filme();
						break;
						
					default :
					echo '';
					
					}
					?>
					<?php
					
					   if (isset($_GET['idCinema'])) 
								$linkchoice=$_GET['idCinema'];
						else $linkchoice='';

					switch($linkchoice){

					case '100' :
						filme_cinema();
						break;
					case '101' :
						filme_cinema();
						break;

					default :
					echo '';
					}
					
					
				?>
				
	</div><!--selectCinema-->
	</div><!--news-->
</div><!--mainContent-->

<div id="footer" class="copyright">
<h3>Copyright</h3>
</div>
</body>
</html>