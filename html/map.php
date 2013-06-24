<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MyCinema</title>
    <link href="main.css" rel="stylesheet" type="text/css"/>
    <link href="romania_map.css" rel="stylesheet" type="text/css"/>
</head>
<body id="feature">
    <div id="header">
        <div id="contact" class="copyright">
            <p>Bine ati venit<p>
            <span class="icon_hold">
                <img id="images" src="images/Phone-Icon-cinema.png"/>
            </span>
            <h4>0236 466 962</h4>
        </div>
        <div id="nav" class="copyright">
            <ul id="mainNav">
                <li><a href="noutati.php" id="homeLink"><span>Noutati</span></a></li>
                <li><a href="despre_noi.php" id="AboutUsLink">Despre Noi</a></li>
                <li><a href="" id="politicsLink">Politici</a></li>
                <li><a href="preturi.php" id="politicsLink">Preturi</a></li>
                <li><a href="" id="contactUsLink">Contact</a></li>
            </ul>
        </div>
        <a class="selectmap" style="background: none;margin-top:10px; float:right; margin-right:5px;" href="locatie.php">
            <img  alt="" src="images/harta.png">
        </a>
    </div><!--nav-->
    <div id="slideShow"></div>
    <div id="mainContent" >
        <form class="form-wrapper cf">
            <input type="text" placeholder="Search here..." required>
            <button type="submit">Search</button>
        </form>
        <h3 style="padding-top:10px; padding-left:10px; float:left;">
            <strong><a href="index.php" style="text-decoration:none;">Acasa >></a></strong><strong>Harta </strong>
        </h3>
        <div id="secondNav" class="copyright">
            <span class="icon_hold">
                <img id="images" src="images/home_32.png">
            </span>
            <h3><a href="index.html"><strong>Acasa</strong></a></h3>
            <ul>
                <li><a href="mainprogram.php" class="homeLinks">Program</a></li>
                <li><a href="filme.php" class="homeLinks">Filme</a></li>
                <li><a href="promotii.php" class="homeLinks">Promotii</a></li>
                <li><a href="" class="homeLinks">Oferte</a></li>
            </ul>
        </div>
        <div id="noutati">
            <span class="icon_hold">
                <img id="images" src="images/ico_noutati.gif">
            </span>
            <h3><strong>Cinema-ul tau</strong></h3>
            <ul id="map_block" class="mapRomania">
                <li><a class="satuMare" href="#">Satu Mare</a></li>
                <li><a class="maramures" href="#">Maramures</a></li>
                <li><a class="suceava" href="#">Suceava</a></li>
                <li><a class="botosani" href="#">Botosani</a></li>
                <li><a class="bihor" href="#">Bihor</a></li>
                <li><a class="salaj" href="#">Salaj</a></li>
                <li><a class="cluj" href="#">Cluj<span class="effect">&nbsp;</span></a></li>
                <li><a class="bistritaNasaud" href="#">Bistrita Nasaud</a></li>
                <li><a class="mures" href="#">Mures</a></li>
                <li><a class="harghita" href="#">Harghita</a></li>
                <li><a class="neamt" href="#">Neamt</a></li>
                <li><a class="iasi" href="#">Iasi</a> </li>
                <li ><a class="arad" href="#">Arad</a> </li>
                <li ><a class="alba" href="#">Alaba</a> </li>
                <li ><a class="sibiu" href="#">Sibiu</a> </li>
                <li ><a class="hunedoara" href="#">Hunedoara</a> </li>
                <li><a class="brasov" href="#">Brasov</a> </li>
                <li><a class="covasna" href="#">Covasna</a> </li>
                <li><a class="bacau" href="#">Bacau</a> </li>
                <li><a class="vaslui" href="#">Vaslui</a> </li>
                <li class="ocupat"><a class="galati" href="program.php?idCinema=100">Galati<span class="effect">&nbsp;</span></a> </li>
                <li><a class="vrancea" href="#">Vrancea</a> </li>
                <li><a class="timis" href="#">Timis</a> </li>
                <li><a class="carasSeverin" href="#">Caras Severin</a> </li>
                <li><a class="gorj" href="#">Gorj</a> </li>
                <li><a class="valcea" href="#">Valcea</a> </li>
                <li><a class="arges" href="#">Arges</a> </li>
                <li><a class="dambovita" href="#">Dambovita</a> </li>
                <li><a class="prahova" href="#">Prahova</a> </li>
                <li><a class="buzau" href="#">Buzau</a> </li>
                <li><a class="braila" href="#">Braila</a> </li>
                <li><a class="mehedinti" href="#">Mehedinti</a> </li>
                <li><a class="dolj" href="#">Dolj</a> </li>
                <li><a class="olt" href="#">Olt</a> </li>
                <li><a class="teleorman" href="#">Teleorman</a> </li>
                <li><a class="giurgiu" href="#">Giurgiu</a> </li>
                <li class="ocupat"><a class="ilfov" href="program.php?idCinema=101">Ilfov<span class="effect">&nbsp;</span></a> </li>
                <li><a class="ialomita" href="#">Ialomita</a> </li>
                <li><a class="calarasi" href="#">Calarasi</a> </li>
                <li><a class="constanta" href="#">Constanta</a> </li>
                <li><a class="tulcea" href="#">Tulcea</a> </li>
            </ul>
        </div>
    </div>
    <div id="footer" class="copyright">
        <h3>Copyright</h3>
    </div>
</body>
</html>
