<?php
	require_once 'config.php';
	
	function all_films(){
		$query= "select idFilm, titlu,gen, descriere, regia, imagine from filme";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
		echo '<div class="newsList">
			<span class="icon_hold">
				<img id="image" src='.$row['imagine'].'>
			</span>
			<h4 >Titlu: '.$row['titlu'].'</h4>
			<p><strong>Gen: '.$row['gen'].'</strong></p>
			<br/>
			<hr class="copyright">
			<p class="copyright">Regia: '.$row['regia'].' <br/>
			'.$row['descriere'].' <br/><a id="check" href="?idFilm='.$row['idFilm'].'" class="detailsLink" >Detalii film</a></p>
		</div>';
			
		}}

    function filme(){
	    $gen=$_GET['gen'];
	    $query="select idFilm, titlu, gen from cinemadb.filme where gen='$gen'";
	    $result=mysql_query($query);

	while ($row=mysql_fetch_array($result)){
		echo '<div class="newsList">
		       <p style="margin-top:5px; margin-left:5px;">
		            <b>'.$row[titlu].'</b> </p><br/>
		        <em style="margin-left:5px;">'.$row[gen].'</em> </br>
		       <p> <a id="check" href="?idFilm='.$row['idFilm'].'" class="detailsLink" >Detalii film</a></div> </p>';
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
	        <h4>0236 466 962</h4>
	    </div> <!--contact-->
        <div id="nav" class="copyright">
            <ul id="mainNav">
	            <li> <a href="noutati.php" id="homeLink">Noutati</a></li>
	            <li><a href="despre_noi.php" id="AboutUsLink">Despre Noi</a></li>
	            <li> <a href="" id="politicsLink">Politici</a></li>
	            <li><a href="preturi.php" id="politicsLink">Preturi</a></li>
	            <li><a href="" id="contactUsLink">Contact</a></li>
            </ul>
        </div><!--nav-->
	        <a class="selectmap" style="background: none;margin-top:10px; float:right; margin-right:5px;" href="map.php">
		        <img  alt="" src="images/harta.png">
	        </a>
     </div><!--header-->
<div id="slideShow">
</div>
<div id="mainContent">
	<form class="form-wrapper cf">
        <input type="text" placeholder="Search here..." required>
        <button type="submit">Search</button>
    </form> 
	<h3 style="padding-top:10px; padding-left:10px; float:left;"><strong><a href="index.php" style="text-decoration:none;">Acasa >></a></strong><strong>Filme </strong></h3>
	<div id="secondNav" class="copyright">
		<span class="icon_hold">
			<img id="images" src="images/home_32.png">
		</span>
		<h3><a href="index.php"><strong>Acasa</strong></a></h3>
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
		 </div>
	</div>


	
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
	</div>


    <div id="news" class="copyright">
   		<span class="icon_hold">
   			<img id="image" src="images/newspaper.png">
   		</span>
   		<h3><strong>Acasa</strong></h3>
   			<?php if(!isset($_GET['gen']) && !isset($_GET['idFilm']))
                    all_films(); ?>
            <?php if(isset($_GET['idFilm']))
                    detalii_film();?>

           <?php
              					if (isset($_GET['gen']))
              								$linkchoice=$_GET['gen'];
              						else $linkchoice='';

              					switch($linkchoice){

              					case 'actiune' :
              						filme();
              						break;

                                case 'animatie' :
                                   filme();
                                   break;

                                   case 'aventura' :
                                       filme();
                                       break;
                                   case 'crima' :
                                       filme();
                                       break;

                                   case 'fantastic' :
                                       filme();
                                       break;
                                   case 'horror' :
                                       filme();
                                       break;
                                   case 'istoric' :
                                       filme();
                                       break;
                                   case 'mister' :
                                       filme();
                                       break;
                                   case 'muzical' :
                                       filme();
                                       break;
                                   case 'razboi' :
                                       filme();
                                       break;
                                   case 'romantic' :
                                       filme();
                                       break;
                                   case 'sf' :
                                       filme();
                                       break;

                                   case 'thriller' :
                                       filme();
                                       break;

                                   case 'western' :
                                       filme();
                                       break;

                                   case 'documentar' :
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


   	</div>
	
</div>
<div id="footer" class="copyright">
<h3>Copyright</h3>
</div>

</body>
</html>
