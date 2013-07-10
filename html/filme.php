<?php
require_once 'config.php';

$query_cinema = "SELECT idCinema, nume FROM cinema ORDER BY nume";
$result_cinema = mysql_query($query_cinema);

$query_gen="select id, nume_gen from gen_film order by nume_gen";
$result_gen = mysql_query($query_gen);
$result_gen_1 = mysql_query($query_gen);

/*
function details_film(){
    $film = $_GET['film'];
    $cinema = $_GET['loc'];
    $gen = $_GET['gen'];
    $data = $_GET['data'];


    $query = "SELECT
             f.titlu, g.nume_gen
              FROM filme f
              INNER JOIN gen_film g ON f.idGen = g.id
              WHERE f.titlu='$film' and g.nume_gen='$gen'";

    $query1 = "SELECT p.ore, p.data
                  FROM filme f, cinema c
                  INNER JOIN program p ON p.idFilm=f.idFilm
                  INNER JOIN cinema c ON c.idCinema=p.idCinema
                  WHERE f.titlu='$film'
                        AND g.nume_gen='$gen'
                        AND p.idCinema='$cinema'
                        AND p.data='$data'";
    $result = mysql_query($query);
    $result1 = mysql_query($query1);
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
}*/


function all_films()
{
    $query = "
            SELECT f.imagine, f.titlu, g.nume_gen, f.regia, f.roluri_principale, f.timp_desf, f.descriere
            FROM filme f
            INNER JOIN gen_film g ON f.idGen = g.id";

    $query1 = "
              SELECT distinct c.idCinema, c.nume
              FROM filme f
              INNER JOIN program p ON f.idFilm = p.idFilm
              INNER JOIN cinema c ON p.idCinema = c.idCinema";
    $result = mysql_query($query);
    $result1 = mysql_query($query1);
    while ($row = mysql_fetch_array($result)) :
        echo " <div style='border-top: 1px solid #000000; margin-bottom: 5px;'>
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
            while ($row1 = mysql_fetch_array($result1)) :
                echo "<a href='program.php?idCinema=${row1['idCinema']}'>Rezerva ${row1['nume']}</a><br/>";
            endwhile;
            echo "</div>";
        endwhile;

}

function filme_gen()
{
    $idGen = $_GET['idGen'];
    $query = "SELECT f.idFilm, f.titlu, f.idGen, g.nume_gen
             FROM filme f, gen_film g
             WHERE g.id=f.idGen AND  f.idGen='$idGen'";
    $query1 = "
              SELECT distinct c.idCinema, c.nume
              FROM filme f
              INNER JOIN program p ON f.idFilm = p.idFilm
              INNER JOIN cinema c ON p.idCinema = c.idCinema";
    $result = mysql_query($query);
    $result1 = mysql_query($query1);
    while ($row = mysql_fetch_array($result)) :
        echo " <div style='border-top: 1px solid #000000; margin-bottom: 5px;'>
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
        while ($row1 = mysql_fetch_array($result1)) :
            echo "<a href='program.php?idCinema=${row1['idCinema']}'>Rezerva ${row1['nume']}</a><br/>";
        endwhile;
        echo "</div>";
    endwhile;

}

function detalii_film(){

    $film = $_GET['film'];

    $query1 = "SELECT f.idFilm, f.titlu, f.idGen, g.nume_gen
             FROM filme f
                  INNER JOIN gen_film g ON  g.id=f.idGen
             WHERE f.titlu='$film'";
    $query2 = "
              SELECT distinct c.idCinema, c.nume
              FROM filme f
              INNER JOIN program p ON f.idFilm = p.idFilm
              INNER JOIN cinema c ON p.idCinema = c.idCinema";

    $result1 = mysql_query($query1);
    $result2 = mysql_query($query2);

    while ($row1 = mysql_fetch_array($result1)) :
        echo " <div style='border-top: 1px solid #000000; margin-bottom: 5px;'>
                    <span class='icon_hold'>
                        <img id='image' src='${row1['imagine']}'>
                    </span>
                <h4>Titlu:<strong> ${row1['titlu']} </strong></h4>
                <p><strong>Gen: ${row1['nume_gen']} </strong></p><br/>
                <hr/>
                <p><b>Regia:</b> ${row1['regia']} <br/>
                <b>Detalii:</b> ${row1['descriere']}<br/>
                <b>Timp desfasurare:</b> ${row1['timp_desf']} minute<br/>
                <b>Roluri principale:</b> ${row1['roluri_principale']}
                </p>";
        while ($row2 = mysql_fetch_array($result2)) :
            echo "<a href='program.php?idCinema=${row2['idCinema']}&film=${row1['titlu']}'>Rezerva ${row2['nume']}</a><br/>";
        endwhile;
        echo "</div>";
    endwhile;
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
            <li><a id="filme" href="filme.php" class="homeLinks" style="cursor:pointer;">Filme</a></li>
            <li><a id="promotii" class="homeLinks" style="cursor:pointer;">Promotii</a></li>
            <li><a id="oferte" class="homeLinks" style="cursor:pointer;">Oferte</a></li>
        </ul>

        <div id="searchBody">
            <h3 style="margin-left:-11px;"><strong>Cauta in program</strong></h3>
            <form action="program.php" method="get">
                <table id="search_table" width="100%" cellspacing="3" cellpadding="3" border="0" style="margin:0 auto">
                    <tr>
                        <td style="text-align:left;">Localitatea:</td>
                        <td style="text-align:left;">
                            <select style="text-align: right; width: 113px;" name="cinema" id="cinema">
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
                </table>
            </form>
        </div>

        <div id="thirdNav">
            <span class="icon_hold">
            <img class="images" src="images/ico_promo.gif">
            </span>

            <h3><strong>Categorii Filme</strong></h3>

            <ul id="film_list">
                <?php while ($row = mysql_fetch_array($result_gen)) : ?>
                    <li><a  href="filme.php?idGen=<?= $row['id']?>"  id="<?= $row['id']?>" class="filmsLink" style="cursor:pointer;"><?= $row['nume_gen'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <div id="news" class="copyright">
        <span class="icon_hold">
            <img id="image" src="images/newspaper.png">
        </span>
        <h3><strong>Filme</strong></h3>
        <div class="newsList">
            <?php
            if(isset($_GET['idGen'])){
                filme_gen();
            }else if(isset($_GET['film'])){
                detalii_film();
            }
            else{
                all_films();
            }
            ?>
        </div>
        </div>
    </div>
</div>
<div id="footer" class="copyright">
    <h3>Copyright</h3>
</div>
</body>
</html>
