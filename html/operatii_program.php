<?php
require_once 'model.php';
require_once 'config.php';

$query = "SELECT idSala, nr_sala FROM sali";
$rez = mysql_query($query);


$query_cinema = "SELECT nume FROM cinema";
$rez_cinema = mysql_query($query_cinema);
$rez_1 = mysql_query($query_cinema);
?>
<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
    <link href="operatii.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/commons.js" type="text/javascript"></script>
    <script src="script/operatii_program.js"></script>
</head>
<body>
    <div id="content">
        <div>
            <em>MyCinema City</em>
        </div>
        <p><span>Administrator: <?= $_SESSION['username'] ?> </span></p>
        <div id="nav" style="clear:right;">
            <ul>
                <li><a id="detalii"> Detalii cont </a></li>
            </ul>
        </div>
        <div id="left" style="clear:both">
            <ul>
                <li><a id="inserari" class="action" href="operatii_filme.php">Operatii</a></li>
                <li><a id="rezervari" class="action" href="rezervari.php">Rezervari</a></li>
                <li><a class="action" href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <div id="right">
            <div id="inserts">
                <ul id="inserts_menu">
                    <li class="right_menu"><a id="filme" href="operatii_filme.php">Filme</a></li>
                    <li id="current" class="right_menu"><a id="program" href="operatii_program.php">Programe</a></li>
                    <li class="right_menu"><a id="reduceri" href="operatii_reduceri.php">Reduceri</a></li>
                    <li class="right_menu"><a id="sali" href="operatii_sali.php">Sali</a></li>
                    <li class="right_menu"><a id="cinematograf" href="operatii_cinema.php".php">Cinema</a></li>
                </ul>
                <div style="width: 500px; float:left;">
                    <fieldset>
                        <legend><a id="inregistrare" href="operatii_program.php" style="background-color:#009933; text-decoration: none; color:black;"><span>Inregistrare program</span></a>
                        <a id="cauta" style="background-color: #B0B0B0 ;"><span>Cauta in program</span></a>
                        <a id="sterge" style="background-color: #B0B0B0 ;"><span>Sterge program</span></a></legend>
                        <div id="div_content" style="visibility: visible">

                        </div>
                    </fieldset>
                </div>
                <div id="rezultat" style="clear:both"></div>
            </div>
        </div>
    </div>

    <div id="div_hidden" style="visibility: hidden">
        <div id="div_inregistrare">
            <table id="table_program">
                <tr>
                    <td><label for="titlu">Titlu: </label></td>
                    <td><input type="text" name="titlu" id="titlu" "></td>
                </tr>
                <tr>
                    <td><label for="cinema">Cinematograful: </label></td>
                     <td>
                        <select name="sala" id="cinema" style="text-align: right;"><?php
                            while($row=mysql_fetch_array($rez_cinema)) {
                                ?>
                                <option value="<?= $row['nume'] ?>"><?= $row['nume']?></option>

                            <?php  }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="data">Data: </label></td>
                    <td >
                        <select  style="text-align: right;" name="data" id="data" ">
                        <?php for ($i=0; $i<7; $i++) :
                            $today = mktime(0,0,0,date("m"),date("d") + $i,date("Y"));
                            $today_show =  date("Y/m/d", $today); ?>
                            <option value="<?= $today_show ?>"> <?= $today_show ?></option>
                        <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="ora">ora: </label></td>
                    <td><input type="text" name="ora" id="ora"></td>
                </tr>
                <tr>
                    <td><label for="sala">Sala: </label></td>
                    <td>
                        <select name="sala" id="sala" style=" text-align: right;"><?php
                            while($row=mysql_fetch_array($rez)) {
                              ?>
                                    <option value="<?= $row['idSala'] ?>"><?= $row['nr_sala']?></option>

                                <?php  }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" id="btn_inregistrare" name="salveaza" value="Salveaza"/></td>
                </tr>
            </table>
        </div>


        <div id="div_cauta">
            <table>
                <tr>
                    <td><label for="titlu">Titlu: </label></td>
                    <td><input type="text" name="titlu" id="titlu"></td>
                </tr>
                <tr>
                    <td><label for="data">Data: </label>
                    </td>
                    <td><input type="text" name="data" id="data"></td>
                </tr>
                <tr>
                    <td><label for="ora">Ora: </label>
                    </td>
                    <td><input type="text" name="ora" id="ora"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" id="btn_cauta" name="Search" value="Cauta"/></td>
                </tr>
            </table>
        </div>

        <div id="div_sterge">
            <table>
                <tr>
                    <td><label for="titlu">Titlu: </label></td>
                    <td><input type="text" id="titlu" name="titlu"></td>
                </tr>
                <tr>
                    <td><label for="data">Data: </label></td>
                    <td><input type="text" id="data" name=" data"></td>
                </tr>
                <tr>
                    <td><label for="ora">Ora: </label></td>
                    <td><input type="text" id="ora" name="ora"></td>
                </tr>
                <tr>
                    <td><label for="cine">Cinematograful: </label></td>
                    <td>
                        <select name="cinema" id="cinema" style="text-align: right;"><?php
                            while ($row1 = mysql_fetch_array($rez_1)) {
                                ?>
                                <option value="<?= $row1['nume'] ?>"><?= $row1['nume'] ?></option>

                            <?php  }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" id="btn_sterge" name="Sterge" value="Sterge"/></td>
                </tr>
            </table>
        </div>
        
    </div>
</body>
</html>

