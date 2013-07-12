<?php
    require_once 'model.php';
    require_once 'config.php';

$query="SELECT tip from reduceri order by tip";
$rez=mysql_query($query);
?>
<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
    <link href="operatii.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/inserts.js" type="text/javascript"></script>
    <script src="script/commons.js" type="text/javascript"></script>
    <script src="script/operatii_reduceri.js" type="text/javascript"></script>
    <script>
;
    </script>
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
                    <li class="right_menu"><a id="program" href="operatii_program.php">Programe</a></li>
                    <li id="current" class="right_menu"><a id="program" href="operatii_reduceri.php">Reduceri</a></li>
                    <li class="right_menu"><a id="sali" href="operatii_sali.php">Sali</a></li>
                    <li class="right_menu"><a id="cinematograf" href="operatii_cinema.php".php">Cinema</a></li>
                </ul>
                <div style="width: 500px; float:left;">
                    <fieldset>
                        <legend>
                            <a id="inregistrare" href="operatii_reduceri.php"  style="background-color:#009933; text-decoration: none; color:black;"><span>Inregistrare reducere</span></a>
                            <a id="vizualizare"  style="background-color: #B0B0B0 ;"><span>Vizualizare reducere</span></a>
                            <a id="sterge" style="background-color: #B0B0B0 ;"><span>Sterge reducere</span></a>
                        </legend>
                        <div id="div_content" style="visibility: visible">
                            <!-- Tabs content will be displayed here -->
                        </div>
                    </fieldset>
                </div>
                <div id="rezultat"> </div>
            </div>
         </div>
     </div>

    <div id="div_hidden" style="visibility: hidden">
        <div id="div_vizualizare"></div>
        <div id="div_inregistrare">
                <table id="table_reduceri">
                    <tbody>
                    <tr>
                        <td><label for="tip">Tip: </label></td>
                        <td><input type="text" name="tip" id="tip" required=""></td>
                    </tr>
                    <tr>
                        <td><label for="pret">Pret: </label></td>
                        <td><input type="text" name="pret" id="pret" required=""></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="btn_inregistrare" value="Salveaza"/></td>
                    </tr>
                    </tbody>
                </table>
        </div>
        <div id="div_sterge">
                <table>
                    <tr><td><label for='tip'>Tip: </label></td>
                         <td>
                            <select name="tip" id="tip">
                                <?php while ($r = mysql_fetch_array($rez)) :?>
                                    <option value="<?= $r['tip'] ?>"><?= $r['tip'] ?></option>

                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                    <tr><td></td><td></td>
                        <td><input type='submit' id='btn_sterge' value='Sterge'/></td>
                    </tr>
                </table>
        </div>
    </div>

</body>
</html>

