<?php
require_once 'model.php';
require_once 'config.php';

$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
$tomorrow= mktime(0,0,0,date("m"),date("d") + 1 ,date("Y"));
$day_after_tomorrow=mktime(0,0,0,date("m"),date("d") + 2 ,date("Y"));
$other_day= mktime(0,0,0,date("m"),date("d") + 3 ,date("Y"));
$other_day_1= mktime(0,0,0,date("m"),date("d") + 4 ,date("Y"));
$other_day_2= mktime(0,0,0,date("m"),date("d") + 5 ,date("Y"));
$other_day_3= mktime(0,0,0,date("m"),date("d") + 6 ,date("Y"));


$idCinema = $_GET['idCinema'];

$nume="select nume from cinema where idCinema='$idCinema'";
$rez_nume=mysql_query($nume);
$row_nume=mysql_fetch_assoc($rez_nume);

$filme= new Filme();



	function filme_data(){
		$data=$_GET['data'];
		$query="select p.idProgram,f.idFilm, f.titlu, f.gen, GROUP_CONCAT(p.ora SEPARATOR ', ') as ora, f.titlu from cinemadb.program p, cinemadb.filme f, cinemadb.cinema c where p.idFilm = f.idFilm and p.idCinema = c.idCinema and c.idCinema='" .$_GET['idCinema'] . "' and data='$data' group by f.titlu";;
		$result=mysql_query($query);
		while ($row = mysql_fetch_array($result)) {
			echo '<div class="det_prog"><div class="leadin">';
			echo '<div class="info" style="width:314px;"><p><b>' . $row['titlu'] . '</b></p> <br/><em>' . $row['gen'] . '</em><p><br/><a href="filme.php?idFilm='.$row['idFilm'].'">Detalii Film..</a></p></div>';
			echo '<div class="rez_info" style="width:190px;"><table ><tbody><tr>';
			echo '<td style="padding:0;margin:0;">';
			echo '<a class="btn_r" href="ReservationPage.php?idProgram=' . $row['idProgram'] . ' "  style="cursor:pointer; margin-top:5px;"><span>R </span></a>' . $row['ora'] . '';
			echo '</td>';
			echo '</tr></tbody></table></div>';
			echo '</div> </div><hr/>';
	}
}




function detalii_film(){

    $idFilm=$_GET['idFilm'];
    $query="select p.idProgram, f.imagine, f.titlu, f.gen, f.regia, f.roluri_principale, f.timp_desf, f.descriere from cinemadb.filme f, cinemadb.program p, cinemadb.cinema c where  p.idFilm=f.idFilm and p.idCinema=c.idCinema and f.idFilm='$idFilm'";
    $result= mysql_query($query);
    while($row=mysql_fetch_array($result)){
        echo '<div class="newsList">
                <span class="icon_hold">
               		<img id="image" src='.$row['imagine'].'>
               	</span>
               	<h4 >Titlu: '.$row['titlu'].'</h4>
               	<p><strong>Gen: '.$row['gen'].'</strong></p><br/>
               	<hr class="copyright">
               	<p class="copyright">Regia: '.$row['regia'].' <br/>
               	Detalii: '.$row['descriere'].'<br/>
               	Timp desfasurare: '.$row['timp_desf'].' minute<br/>
               	Roluri principale: '.$row['roluri_principale'].'
               	</p>
               	<a  href="ReservationPage.php?idProgram='.$row['idProgram'].'">Rezerva Galati</a><br/>
               	<a href="">Rezerva Bucuresti</a>
              </div>';

    }
}


    $query = "select p.idProgram, f.titlu, f.idFilm, f.gen, p.ora from cinemadb.program p, cinemadb.filme f, cinemadb.cinema c where p.idFilm = f.idFilm and p.idCinema = c.idCinema and c.idCinema='" . $idCinema . "' and data=CURDATE()";
    $result = mysql_query($query);



?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MyCinema</title>
<link href="main.css" rel="stylesheet" type="text/css"/>
<link href="program.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $("#maine").click( function(){
            document.getElementById('maine').style.backgroundColor='red';

        }
    });


</script>
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
	<h3 style="padding-top:10px; padding-left:10px; float:left;"><strong>Acasa >></strong><strong><a href="mainprogram.php" style="text-decoration:none;">Program >></strong></a><strong><?php $locatie=$_GET['idCinema']; $query="select nume from cinema where idCinema='$locatie'"; $rez=mysql_query($query); while($row=mysql_fetch_array($rez)){echo $row['nume'];} ?></strong></h3>
	<div id="secondNav" class="copyright">
		<span class="icon_hold">
			<img id="images" src="images/home_32.png">
		</span>
		<h3 ><a href="index.php"><strong>Acasa</strong></a></h3>
		<ul>
			<li><a href="mainprogram.php" class="homeLinks">Program</a></li>
			<li><a href="filme.php" class="homeLinks">Filme</a></li>
			<li><a href="" class="homeLinks">Promotii</a></li>
			<li><a href="" class="homeLinks">Oferte</a></li>
			
		</ul>
		<h3><strong>Cauta in program</strong></h3>
		<div id="searchBody" >
			<form id="searcFilmCategory" method="get" action="program.php" name="searchform">
				<table width="100%" cellspacing="3" cellpadding="3" border="0" style="margin:0 auto">
				<tbody>
				<tr><td style="text-align:left;">Localitatea</td>
					<td style="text-align:left;">
					<select class="textbox" style="width:95px" name="loc">
							<option class="textbox" value="">selecteaza</option>
							<option class="textbox" value="100">Galati</option>
							<option class="textbox" value="101">Bucuresti</option>
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
						<option value="<?= date("Y/m/d", $today); ?>"><?= date("d/m/Y", $today); ?></option>
						<option value="<?= date("Y/m/d", $tomorrow); ?>"><?= date("d/m/Y", $tomorrow); ?></option>
						<option value="<?= date("Y/m/d", $day_after_tomorrow); ?>"><?= date("d/m/Y", $day_after_tomorrow); ?></option>
						<option value="<?= date("Y/m/d", $other_day); ?>"><?= date("d/m/Y", $other_day); ?></option>
						<option value="<?= date("Y/m/d", $other_day_1); ?>"><?= date("d/m/Y", $other_day_1); ?></option>
						<option value="<?= date("Y/m/d", $other_day_2); ?>"><?= date("d/m/Y", $other_day_2); ?></option>
						<option value="<?= date("Y/m/d", $other_day_3); ?>"><?= date("d/m/Y", $other_day_3); ?></option>
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
   	<div id="program_film">

   		<h3><strong> Program - <?= $row_nume['nume']; ?> </strong></h3>
   		<div id="menu_program">
   			<ul>
   			<li id="current_program">
   				<a id="azi" href="?data=<?=  date("Y/m/d", $today)?>&idCinema=<?= $idCinema ?>"><span> <?= date("d/m/Y", $today); ?> </span></a></li>
   			<li id="li_maine" >
   				<a id="maine" href="?data=<?= date("Y/m/d", $tomorrow) ?>&idCinema=<?= $idCinema ?>"><span><?= date("d/m/Y", $tomorrow);  ?> </span></a></li>
   			<li id="li_maine">
   				<a id="alta_zi" href="?data=<?= date("Y/m/d", $day_after_tomorrow); ?>&idCinema=<?= $idCinema ?>"><span><?= date("d/m/Y", $day_after_tomorrow); ?> </span></a></li>
   			<li id="li_alta_zi">
   				<a id="alta_zi_1" href="?data=<?= date("Y/m/d", $other_day);?>&idCinema=<?= $idCinema ?>"><span><?= date("d/m/Y", $other_day); ?> </span></a></li>
   			<li id="li_alta_zi_2">
   				<a id="alta_zi_2" href="?data=<?= date("Y/m/d", $other_day_1);?>&idCinema=<?= $idCinema ?>"><span><?= date("d/m/Y", $other_day_1); ?></span></a></li>
   			<li id="li_alta_zi_3">
   				<a id="alta_zi_3" href="?data=<?= date("Y/m/d", $other_day_2); ?>&idCinema=<?= $idCinema ?>"><span><?= date("d/m/Y", $other_day_2); ?></span></a></li>
   			<li id="li_alta_zi_4">
   				<a id="alta_zi_4" href="?data=<?= date("Y/m/d", $other_day_3); ?>&idCinema=<?= $idCinema ?>"><span><?= date("d/m/Y", $other_day_3); ?></span></a></li>
   			</ul>

   		</div>
        <?php  while ($row = mysql_fetch_array($result)) {?>
        <div class="det_prog"><div class="leadin">
            <div class="info" style="width:314px;"><p><b><?= $row['titlu'] ?></b></p> <br/><p><em><?= $row['gen']?></em></p><br/><p><a href="filme.php?idFilm=<?= $row['idFilm']?>">Detalii Film..</a></p></div>
            <div class="rez_info" style="width:190px;">
                <table><tbody><tr>
                    <td style="padding:0;margin:0;">
                         <a style="text-decoration: none;" class="btn_r" href="ReservationPage.php?idProgram=<?= $row['idProgram']?>"  style="cursor:pointer; margin-top:5px;"><p style="color:white; margin-left: 20px;"><?= $row['ora']?></p></a>
                    </td></tr>
                </tbody>
                 </table>
            </div>
        </div> </div><hr/>
       <?php  } ?>

   				<?php

   					if (isset($_GET['data']) &&isset($_GET['idCinema']))
   							$link=$_GET['data'];

   					else
   						$link='';

   					switch($link) {
   					case '2013/05/20':
   						filme_data();
   						break;
   					case '2013/05/21':
   						filme_data();
   						break;

   					case '2013/05/22':
   						filme_data();
   						break;

   					case '2013/05/23':
   						filme_data();
   						break;
   					default:
   					echo '';
   					}

   				?>

   	</div><!--programFilm-->
   	</div><!--news-->
	
	<div id="thirdNav" class="copyright" >
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
