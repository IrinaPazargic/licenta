<?php
require_once 'config.php';

$query_cinema = "SELECT idCinema, nume FROM cinema ORDER BY nume";
$result_cinema = mysql_query($query_cinema);

$query_gen="select id, nume_gen from gen_film order by nume_gen";
$result_gen = mysql_query($query_gen);
$result_gen_1 = mysql_query($query_gen);

$result_gen_1 = mysql_query($query_gen);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MyCinema</title>
    <link href="main.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="blueberry.css" type="text/css" />
    <link href="program.css" rel="stylesheet" type="text/css"/>
    <link href="romania_map.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/meniuri.js"></script>
    <script src="script/jquery.blueberry.js"></script>
    <script src="script/commons.js"></script>
    <script>
        $(window).load(function() {
            $('.blueberry').blueberry();
        });
    </script>
<style>
    #doc { margin: 10px 0; }
    #content {
        margin: 0 auto;
        min-width: 740px;
        max-width: 1140px;
    }

    .blueberry { max-width: 800px; }
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
    <div id="cale"></div>
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
                <li><a href="filme.php?idGen=<?= $row['id']?>" id="<?= $row['id']?>" class="filmsLink" style="cursor:pointer; background-image: url(images/star_16.png);" ><?= $row['nume_gen'] ?> </a></li>
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
        </div>
    </div>
</div>
<div id="footer" class="copyright">
    <h3>Copyright</h3>
</div>
</body>
</html>
