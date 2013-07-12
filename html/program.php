<?php
require_once 'model.php';
require_once 'config.php';


$query_cinema = "SELECT idCinema, nume FROM cinema ORDER BY nume";
$result_cinema = mysql_query($query_cinema);

$query_gen="select id, nume_gen from gen_film order by nume_gen";
$result_gen = mysql_query($query_gen);
$result_gen_1 = mysql_query($query_gen);
$result_gen_1 = mysql_query($query_gen);

$cinema=$_GET['cinema'];

$query_nume="select idCinema, nume from cinema where nume='$cinema'";
$rez=mysql_query($query_nume);
$row_nume= mysql_fetch_assoc($rez);


$filme= new Filme();


function detalii_film(){
    $cinema = $_GET['cinema'];
    $film = $_GET['film'];

    $query= " SELECT
              f.titlu, g.nume_gen, c.nume, f.idFilm
              , GROUP_CONCAT(DISTINCT CONCAT(p.ora, '|', p.idProgram) ORDER BY p.ora ASC SEPARATOR ',') AS hours
            FROM filme f
              INNER JOIN program p ON f.idFilm = p.idFilm
              INNER JOIN gen_film g ON f.idGen = g.id
              INNER JOIN cinema c ON p.idCinema = c.idCinema
            WHERE c.nume='$cinema'
                  AND f.titlu='$film'
                  AND data=CURDATE()
            GROUP BY f.titlu
            ORDER BY f.titlu
            ";

    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) :
        $hours = $row['hours'];
        $hours_array = explode(",", $hours);
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?film=${row['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>";
        foreach ($hours_array as $hour) :
            $hour_array = explode('|', $hour);
            echo "<td style='margin:0;'>
                                        <a style='text-decoration: none; margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=${hour_array[1]}' style='cursor:pointer; margin-top:5px;'>
                                       <p style='color:white; margin-left: 20px;'>${hour_array[0]}</p></a></td>";
        endforeach;
        echo "     </tr>
                    </table>
                </div>
                </div>
            </div><hr/> ";
    endwhile;

}
// afiseaza lista de filme ce ruleaza la un cinematograf in data curenta

function afisare_lista(){

    $cinema=$_GET['cinema'];
    $query= "
             SELECT
              f.titlu, g.nume_gen, c.nume, f.idFilm
              , GROUP_CONCAT(DISTINCT CONCAT(p.ora, '|', p.idProgram) ORDER BY p.ora ASC SEPARATOR ',') AS hours
            FROM filme f
              INNER JOIN program p ON f.idFilm = p.idFilm
              INNER JOIN gen_film g ON f.idGen = g.id
              INNER JOIN cinema c ON p.idCinema = c.idCinema
            WHERE c.nume='$cinema'
                  AND data=CURDATE()
            GROUP BY f.titlu
            ORDER BY f.titlu
            ";

    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) :
        $hours = $row['hours'];
        $hours_array = explode(",", $hours);
       echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?film=${row['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>";
                        foreach ($hours_array as $hour) :
                            $hour_array = explode('|', $hour);
                            echo "<td style='margin:0;'>
                                        <a style='text-decoration: none; margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=${hour_array[1]}' style='cursor:pointer; margin-top:5px;'>
                                       <p style='color:white; margin-left: 20px;'>${hour_array[0]}</p></a></td>";
                        endforeach;
              echo "     </tr>
                    </table>
                </div>
                </div>
            </div><hr/> ";
    endwhile;

}

//cautare program in functie de data si cinema

function program_data(){
    $data=$_GET['data'];
    $cinema=$_GET['cinema'];

    $query= "
            SELECT
              f.titlu, g.nume_gen, c.nume, f.idFilm
              , GROUP_CONCAT(DISTINCT CONCAT(p.ora, '|', p.idProgram) ORDER BY p.ora ASC SEPARATOR ',') AS hours
            FROM filme f
              INNER JOIN program p ON f.idFilm = p.idFilm
              INNER JOIN gen_film g ON f.idGen = g.id
              INNER JOIN cinema c ON p.idCinema = c.idCinema
            WHERE c.nume='$cinema'
                  AND data='$data'
            GROUP BY f.titlu
            ORDER BY f.titlu
            ";

    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) :
        $hours = $row['hours'];
        $hours_array = explode(",", $hours);
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?film=${row['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>";
        foreach ($hours_array as $hour) :
            $hour_array = explode('|', $hour);
            echo "<td style='margin:0;'>
                                        <a style='text-decoration: none; margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=${hour_array[1]}' style='cursor:pointer; margin-top:5px;'>
                                       <p style='color:white; margin-left: 20px;'>${hour_array[0]}</p></a></td>";
        endforeach;
        echo "     </tr>
                    </table>
                </div>
                </div>
            </div><hr/> ";
    endwhile;


}

//cautare film in functie 4 criterii

function cauta_film(){
    $cinema = $_GET['cinema'];
    $gen = $_GET['gen'];
    $film = $_GET['film'];
    $data = $_GET['data'];
    $query= "
             SELECT
              f.titlu, g.nume_gen, c.nume, f.idFilm
              , GROUP_CONCAT(DISTINCT CONCAT(p.ora, '|', p.idProgram) ORDER BY p.ora ASC SEPARATOR ',') AS hours
            FROM filme f
              INNER JOIN program p ON f.idFilm = p.idFilm
              INNER JOIN gen_film g ON f.idGen = g.id
              INNER JOIN cinema c ON p.idCinema = c.idCinema
            WHERE c.nume='$cinema'
                  AND data='$data'
                  AND f.titlu='$film'
                  AND g.nume_gen='$gen'
            GROUP BY f.titlu
            ORDER BY f.titlu
            ";


    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) :
        $hours = $row['hours'];
        $hours_array = explode(",", $hours);
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?film=${row['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>";
        foreach ($hours_array as $hour) :
            $hour_array = explode('|', $hour);
            echo "<td style='margin:0;'>
                                        <a style='text-decoration: none; margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=${hour_array[1]}' style='cursor:pointer; margin-top:5px;'>
                                       <p style='color:white; margin-left: 20px;'>${hour_array[0]}</p></a></td>";
        endforeach;
        echo "     </tr>
                    </table>
                </div>
                </div>
            </div><hr/> ";
    endwhile;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MyCinema</title>
    <link href="main.css" rel="stylesheet" type="text/css"/>
    <link href="program.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="blueberry.css" type="text/css" />
    <link href="romania_map.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/commons.js"></script>
    <script src="script/jquery.blueberry.js"></script>
    <script src="script/meniuri.js"></script>
    <script src="script/commons.js"></script>
    <script>
        $(window).load(function () {
            $('.blueberry').blueberry();
        });
    </script>
<style>
        #doc {
            margin: 10px 0;
        }

        #content {
            margin: 0 auto;
            min-width: 740px;
            max-width: 1140px;
        }

        .blueberry {
            max-width: 800px;
        }
</style>
</head>
<body id="feature">
<div id="header">
        <span>
            <img type="img" src="images/logo_1.gif">
        </span>
    <div id="contact">
        <p><strong>Bine ati venit!</strong></p>
    </div>
    <div id="nav">
        <ul id="mainNav">
            <li><a id="noutati" style="cursor:pointer;">Noutati</a></li>
            <li><a id="despre_noi" style="cursor:pointer;">Despre Noi</a></li>
            <li><a id="politici" style="cursor:pointer;" >Politici</a></li>
            <li><a id="preturi" style="cursor:pointer;">Preturi</a></li>
            <li><a id="detalii_contact" style="cursor:pointer;">Contact</a></li>
        </ul>
    </div>
    <div style="float:right; margin-top:-15px;">
        <a class="selectmap" id="map" style="margin-right:5px;">
            <img alt="" src="images/harta.png">
        </a>
    </div>

</div>
<!--nav-->
<div id="doc">
    <div id="content">
        <!-- blueberry -->
        <div class="blueberry" >
            <ul class="slides">
                <li><img src="images/world_war.jpg" /></li>
                <li><img src="images/hangover3.jpg" /></li>
            </ul>
        </div>

        <!-- blueberry -->
    </div>
</div>
<div id="mainContent">
    <div id="cale">
      <h3 style="padding-top:10px; padding-left:10px; float:left; font-size:1.3em;">
            <strong><a href="index.php" style="text-decoration:none;">Acasa >></a></strong>
            <strong>Program </strong>
        </h3>
    </div>
    <div id="secondNav" class="copyright">
            <span class="icon_hold">
                <img id="images" src="images/home_32.png">
            </span>

        <h3><a href="index.php"><strong>Acasa</strong></a></h3>
        <ul>
            <li><a id="program" class="homeLinks" style="cursor:pointer;">Program</a></li>
            <li><a id="filme" href="filme.php" class="homeLinks" style="cursor:pointer;">Filme</a></li>
            <li><a id="promotii" class="homeLinks" style="cursor:pointer;">Promotii</a></li>
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
                                <option class="textbox" value="<?= $row['nume'] ?>"><?= $row['nume'] ?></option>
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
                                <option value="<?= $row['nume_gen'] ?>"><?= $row['nume_gen']?></option>

                            <?php  }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;">Titlu:</td>
                    <td style="text-align:left;">
                        <input style=" width: 108px;" type="text" value="" style="width:90px" name="film" id="film"
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
                    <li><a  href="filme.php?idGen=<?= $row['id']?>" id="<?= $row['id']?>" class="filmsLink" style=" background-image: url(images/star_16.png); cursor:pointer;"><?= $row['nume_gen'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <div id="news" class="copyright">

            <div id="program_film">
                <h3><strong> Program - <?= $row_nume['nume'] ?> </strong></h3>
                <div id="menu_program">
                    <ul>
                            <?php for ($i = 0; $i < 7; $i++) :
                                $today = mktime(0, 0, 0, date("m"), date("d") + $i, date("Y"));
                                $today_show = date("Y/m/d", $today); ?>
                                <li>
                                <a  href="?data=<?=  date("Y/m/d", $today + $i)?>&cinema=<?= $row_nume['nume']?>" id="zi_<?= $id ?>" style="background-color: #575757;" >
                                    <span><?= $today_show ?></span>
                                </a>
                            </li>
                            <?php endfor; ?>

                    </ul>
                </div>

                <div id="change">

                    <?php
                    if (isset($_GET['cinema']) && isset($_GET['gen'])&& isset($_GET['film']) && isset($_GET['data']))
                        cauta_film();
                    elseif (isset($_GET['data']) && isset($_GET['cinema'])) {
                        program_data();
                    } elseif (isset($_GET['cinema']) && isset($_GET['film'])) {
                        detalii_film();
                    } else {
                        afisare_lista();
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

