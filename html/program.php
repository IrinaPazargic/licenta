<?php
require_once 'model.php';
require_once 'config.php';


$query_cinema = "SELECT idCinema, nume FROM cinema ORDER BY nume";
$result_cinema = mysql_query($query_cinema);

$query_gen="select id, nume_gen from gen_film order by nume_gen";
$result_gen = mysql_query($query_gen);
$result_gen_1 = mysql_query($query_gen);
$result_gen_1 = mysql_query($query_gen);

$idCinema=$_GET['idCinema'];

$query_nume="select idCinema, nume from cinema where idCinema='$idCinema'";
$rez=mysql_query($query_nume);
$row_nume= mysql_fetch_assoc($rez);

$filme= new Filme();

function detalii_film(){
    $cinema = $_GET['idCinema'];
    $film = $_GET['film'];

    $query1 = "
               SELECT
                  f.titlu, g.nume_gen
                  FROM filme f
                  INNER JOIN gen_film g ON f.idGen = g.id
                  WHERE
                        f.titlu='$film'";
    $query2 = "
            SELECT
                p.idProgram, p.ora
            FROM
                program p  INNER JOIN  filme f ON p.idFilm = f.idFilm
                           INNER JOIN cinema c ON p.idCinema = c.idCinema
            WHERE
                p.idCinema='$cinema'
                AND f.titlu='$film'
                AND p.data=CURDATE()
            ";
    $result1 = mysql_query($query1);
    $result2 = mysql_query($query2);

    while ($row1 = mysql_fetch_array($result1)) :
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row1['titlu']}</b></p> <br/>
                        <p><em> ${row1['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?film=${row1['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>";
        while($row2=mysql_fetch_array($result2)) :
            echo              "<td style='padding:0;margin:0;'>
                              <a style='text-decoration: none; cursor:pointer;margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=${row2['idProgram']}'>
                            <p style='color:white; margin-left: 20px;'>${row2['ora']}</p></a>
                        </td>";
        endwhile;
        echo                   "</tr>

                    </table>
                </div>
                </div>
            </div><hr/> ";
    endwhile;

}

function afisare_lista(){
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
                AND data=CURDATE()
            ";
    $result = mysql_query($query);
    $rows=array();

    while ($row = mysql_fetch_array($result)) {
        $rows[$row['idProgram']] = $row['ora'];
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
                           foreach ($rows as $idProgram => $ora) :
                            echo "<td style='margin:0;'>
                                    <a style='text-decoration: none; margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=$idProgram' style='cursor:pointer; margin-top:5px;'>
                                <p style='color:white; margin-left: 20px;'>$ora</p></a></td>";
                            endforeach;
              echo "     </tr>
                    </table>
                </div>
                </div>
            </div><hr/> ";
    }

}

//cautare program in functie de data

function program_data(){
    $data=$_GET['data'];
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
                AND p.data='$data'
                AND p.idCinema='$idCinema'";

    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?film=${row['titlu']}'>Detalii Film..</a></p>
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

function cauta_film(){
    $cinema = $_GET['cinema'];
    $idGen = $_GET['gen'];
    $film = $_GET['titlu'];
    $data = $_GET['data'];

    $query1 = "SELECT
                  f.titlu, g.nume_gen
                  FROM filme f
                  INNER JOIN gen_film g ON f.idGen = g.id
                  WHERE
                        f.titlu='$film' and g.id='$idGen'";
    $query2 = "
            SELECT
                p.idProgram, p.ora, p.data
            FROM
                program p  INNER JOIN  filme f ON p.idFilm = f.idFilm
                           INNER JOIN cinema c ON p.idCinema = c.idCinema
            WHERE
                c.idCinema='$cinema'
                AND p.data='$data'
                AND f.titlu='$film'
            ";

    $result1 = mysql_query($query1);
    $result2 = mysql_query($query2);
    while ($row1 = mysql_fetch_array($result1)) :
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row1['titlu']}</b></p> <br/>
                        <p><em> ${row1['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?film=${row1['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>";
    while($row2=mysql_fetch_array($result2)) :
         echo              "<td style='padding:0;margin:0;'>
                              <a style='text-decoration: none; cursor:pointer;margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=${row2['idProgram']}'>
                            <p style='color:white; margin-left: 20px;'>${row2['ora']}</p></a>
                        </td>";
    endwhile;
     echo                   "</tr>

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
    <link href="romania_map.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/commons.js"></script>
    <script src="script/meniuri.js"></script>
    <script>
        $(".current_data").click(function () {
            var zi =  $(this).attr('id')
            highlightCurrentElement(buttonsArray, zi)
            }
        });
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
            <form action="" method="get">
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
                    <li><a  href="filme.php?idGen=<?= $row['id']?>" id="<?= $row['id']?>" class="filmsLink" style="cursor:pointer;"><?= $row['nume_gen'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <div id="news" class="copyright">

            <div id="program_film">
                <h3><strong> Program - <?= $row_nume['nume']; ?> </strong></h3>
                <div id="menu_program">
                    <ul>
                        <li>
                            <?php for ($i = 0; $i < 7; $i++) :
                                $today = mktime(0, 0, 0, date("m"), date("d") + $i, date("Y"));
                                $today_show = date("Y/m/d", $today); ?>
                                <a class="current_data" href="?data=<?=  date("Y/m/d", $today + $i)?>&idCinema=<?= $row_nume['idCinema']?>" id="zi_<?= $i?>" style="cursor: pointer; background-color: #474747;">
                                    <span><?= $today_show ?></span>
                                </a>
                            <?php endfor; ?>
                        </li>
                    </ul>
                </div>

                <div id="change">

                    <?php
                    if (isset($_GET['cinema']) && isset($_GET['gen'])&& isset($_GET['titlu']) && isset($_GET['data']))
                        cauta_film();
                    elseif (isset($_GET['data']) && isset($_GET['idCinema'])){
                        program_data();
                    } elseif (isset($_GET['idCinema']) && isset($_GET['film'])){
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

