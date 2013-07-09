<?php
require_once 'config.php';

$query_cinema = "SELECT idCinema, nume FROM cinema ORDER BY nume";
$result_cinema = mysql_query($query_cinema);

$query_gen="select id, nume_gen from gen_film order by nume_gen";
$result_gen = mysql_query($query_gen);
$result_gen_1 = mysql_query($query_gen);

//detaliile filmelor apelate din filme.php

function details_film(){
    $film = $_GET['film'];

    $query = "SELECT f.imagine, f.titlu, g.nume_gen, f.regia, f.roluri_principale, f.timp_desf, f.descriere, p.idCinema, c.nume
          FROM filme f, program p, gen_film g, cinema c
          WHERE p.idFilm=f.idFilm
            AND c.idCinema=p.idCinema
            AND g.id=f.idGen
            AND f.titlu='$film'";
    $result = mysql_query($query);
    $rows=array();
    while ($row = mysql_fetch_array($result)) :
        $rows[$row['idCinema']] = $row['nume'];
        echo "  <div style='border-top: 1px solid #000000; margin-bottom: 5px;'>
                <span class='icon_hold'>
                <img id='image' src='${row['imagine']}'>
                  </span>
                    <h4>Titlu:<strong> ${row['titlu']} </strong></h4>
                    <p><strong>Gen: ${row['nume_gen']} </strong></p><br/>
                    <hr/>
                    <p><b>Regia:</b> ${row['regia']} <br/>
                       <b>Detalii:</b> ${row['descriere']}<br/>
                       <b>Timp desfasurare:</b> ${row['timp_desf']} minute<br/>
                       <b>Roluri principale:</b> ${row['roluri_principale']}
                    </p>";

          foreach ($rows as $idCinema => $numeCinema) :
               echo    " <a href='?idCinema={$idCinema}'>Rezerva $numeCinema</a><br/>";
          endforeach;
          echo "</div>";
    endwhile;
}


$result_gen_1 = mysql_query($query_gen);

//detaliile filmelor apelate din filme.php

function film_program_cinema(){
    $idCinema=$_GET['idCinema'];
    $query = "
            SELECT
                p.idProgram, f.titlu, f.idFilm, f.idGen, p.ora, g.nume_gen
            FROM
                program p, filme f, cinema c, gen_film g
            WHERE
                p.idFilm = f.idFilm
                AND p.idCinema = c.idCinema
                AND f.idGen = g.id
                AND c.idCinema='$idCinema'
            ";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='?film=${row['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>
                            <td style='padding:0;margin:0;'>
                                <a style='text-decoration: none;' class='btn_r' href='ReservationPage.php?idProgram=${row['idProgram']}'  style='cursor:pointer; margin-top:5px;'>
                                <p style='color:white; margin-left: 20px;'>${row['ora']}</p></a>
                            </td>
                        </tr>

                    </table>
                </div>
                </div>
            </div><hr/> ";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MyCinema</title>
    <link href="main.css" rel="stylesheet" type="text/css"/>
    <link href="program.css" rel="stylesheet" type="text/css"/>
    <link href="romania_map.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/meniuri.js"></script>
    <script>

    </script>

</head>
<body id="feature">
<div id="header">
    <div id="contact" class="copyright">
        <p>Bine ati venit

        <p>
            <span class="icon_hold">
                <img id="images" src="images/Phone-Icon-cinema.png">
            </span>
        <h4>0236 466 962</h4>
    </div>
    <div id="nav" class="copyright">
        <ul id="mainNav">
            <li><a id="noutati" style="cursor:pointer;">Noutati</a></li>
            <li><a id="despre_noi" style="cursor:pointer;">Despre Noi</a></li>
            <li><a id="politici" style="cursor:pointer;" >Politici</a></li>
            <li><a id="preturi" style="cursor:pointer;">Preturi</a></li>
            <li><a id="detalii_contact" style="cursor:pointer;">Contact</a></li>
        </ul>
    </div>
    <a class="selectmap" id="map" style="background: none;margin-top:10px; float:right; margin-right:5px;">
        <img alt="" src="images/harta.png">
    </a>
</div>
<!--nav-->
<div id="slideShow">
</div>
<div id="mainContent">
    <div id="cale"></div>
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
            <li><a id="program" class="homeLinks" style="cursor:pointer;">Program</a></li>
            <li><a id="filme" class="homeLinks" style="cursor:pointer;">Filme</a></li>
            <li><a id="promotii" class="homeLinks" style="cursor:pointer;">Promotii</a></li>
            <li><a id="oferte" class="homeLinks" style="cursor:pointer;">Oferte</a></li>
        </ul>

        <div id="searchBody">
            <h3 style="margin-left:-11px;"><strong>Cauta in program</strong></h3>
            <table id="search_table" width="100%" cellspacing="3" cellpadding="3" border="0" style="margin:0 auto">
                <tbody>
                <tr>
                    <td style="text-align:left;">Localitatea:</td>
                    <td style="text-align:left;">
                        <select style="text-align: right; width: 113px;" name="loc" id="cinema">
                            <?php while ($row = mysql_fetch_array($result_cinema)) : ?>
                                <option class="textbox" value="<?= $row['idCinema'] ?>"><?= $row['nume'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;">Categorie:</td>
                    <td>
                        <select name="gen" id="gen" style=" text-align: right;"><?php
                            while($row=mysql_fetch_array($result_gen_1)) {
                                ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nume_gen']?></option>

                            <?php  }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;">Titlu:</td>
                    <td style="text-align:left;">
                        <input style=" width: 108px;" type="text" value="" style="width:90px" name="titlu" id="titlu"
                               size="11">
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;">Data:</td>
                    <td>
                        <select style="text-align: right; width: 113px;" name="data" id="data" ">
                        <?php for ($i = 0; $i < 7; $i++) :
                            $today = mktime(0, 0, 0, date("m"), date("d") + $i, date("Y"));
                            $today_show = date("Y/m/d", $today); ?>
                            <option value="<?= $today_show ?>"> <?= $today_show ?></option>
                        <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;"></td>
                    <td style="text-align:center;">
                        <input style="cursor:pointer;" class="submit" type="submit" value="CAUTA" id="btn_cauta">
                    </td>
                </tr>
                </tbody>
            </table>

        </div>

        <div id="thirdNav">
            <span class="icon_hold">
            <img class="images" src="images/ico_promo.gif">
            </span>

            <h3><strong>Categorii Filme</strong></h3>

            <ul id="film_list">
                <?php while ($row = mysql_fetch_array($result_gen)) : ?>
                <li><a  id="<?= $row['id']?>" class="filmsLink" style="cursor:pointer;"><?= $row['nume_gen'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <div id="news" class="copyright">
        <span class="icon_hold">
                <img id="image" src="images/newspaper.png">
            </span>

        <h3><strong>Acasa</strong></h3>

        <div class="newsList">
            <?php if(isset($_GET['film'])) {
                details_film();
            }else
                film_program_cinema();

            ?>
        </div>
    </div>
</div>
<div id="footer" class="copyright">
    <h3>Copyright</h3>
</div>
</body>
</html>
