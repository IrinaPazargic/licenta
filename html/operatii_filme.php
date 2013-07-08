<?php
require_once 'config.php';

$titlu = $_POST['titlu'];
$query_cauta = "SELECT titlu FROM filme WHERE titlu='$titlu'";
$rez = mysql_query($query_cauta);
$row_cauta = mysql_fetch_array($rez);

$query="select id, nume_gen from gen_film";
$result=mysql_query($query);

?>
<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
    <link href="operatii.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/commons.js"></script>
    <script src="script/operatii_filme.js"></script>
    <script src="script/upload_file.js"></script>
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
                <li><a class="action" href="operatii_filme.php">Operatii</a></li>
                <li><a id="rezervari" class="action" href="rezervari.php">Rezervari</a></li>
                <li><a class="action" href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <div id="right">
            <div id="inserts">
                <ul id="inserts_menu">
                    <li id="current" class="right_menu"><a id="filme" href="operatii_filme.php">Filme</a></li>
                    <li class="right_menu"><a id="program" href="operatii_program.php">Programe</a></li>
                    <li class="right_menu"><a id="reduceri" href="operatii_reduceri.php">Reduceri</a></li>
                    <li class="right_menu"><a id="sali" href="operatii_sali.php">Sali</a></li>
                    <li class="right_menu"><a id="cinematograf" href="operatii_cinema.php".php">Cinema</a></li>
                </ul>
                <div style="width: 500px; float:left;">
                    <fieldset>
                        <legend>
                            <a id="inregistrare" href="operatii_filme.php"
                               style="background-color: red; text-decoration: none; color:black;"><span>Inregistrare film</span></a>
                            <a id="cauta" style="background-color: gray;"><span>Cauta film</span></a>
                            <a id="sterge" style="background-color: gray;"><span>Sterge film</span></a>
                        </legend>
                        <div id="div_content" style="visibility: visible">
                            <!-- Tabs content will be displayed here -->
                        </div>
                    </fieldset>
                </div>

                <div id="rezultat" style="clear:both;"></div>
            </div>
        </div>
    </div>
    <div id="div_hidden" style="visibility: hidden">
        <div id="div_cauta">
            <table>
                <tr>
                    <td><label for="titlu">Titlu: </label></td>
                    <td><input type="text" name="titlu" id="titlu"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="search" id="btn_cauta" value="Cauta"/></td>
                </tr>
            </table>
        </div>
        <div id="div_inregistrare">
            <form enctype="multipart/form-data" id="upload" action="inregistrare_film.php" method="POST">
                <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="10000000"/>
                <table id="table_films">
                    <tr>
                        <td><label for="titlu">Titlu: </label></td>
                        <td><input type="text" name="titlu" id="titlu" required=""></td>
                    </tr>
                    <tr>
                        <td><label for="gen">Gen: </label></td>
                        <td>
                            <select name="gen" id="gen" style=" text-align: right;"><?php
                                while($row=mysql_fetch_array($result)) {
                                    ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['nume_gen']?></option>

                                <?php  }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="an">Anul aparitiei: </label></td>
                        <td><input type="text" name="an" id="an" required=""></td>
                    </tr>
                    <tr>
                        <td><label for="timp_desf">Durata: </label></td>
                        <td><input type="text" name="durata" id="durata" required=""></td>
                    </tr>
                    <tr>
                        <td><label for="descriere">Descriere: </label></td>
                        <td><textarea rows="4" cols="30" name="descriere" id="descriere" required="">
                            </textarea></td>
                    </tr>
                    <tr>
                        <td><label for="regia">Regia: </label></td>
                        <td><input type="text" name="regia" id="regia" required=""></td>
                    </tr>
                    <tr>
                        <td><label for="uploadedfile">Imagine: </label></td>
                        <td><input type="file" id="fileselect" name="fileselect[]" required=""></td>
                    </tr>
                    <tr>
                        <td><label for="roluri_principale">Roluri principale: </label></td>
                        <td><input type="text" name="rol" id="rol" required=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" name="salveaza" id="btn_inregistrare" value="Salveaza"/></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="div_sterge">
            <table>
                <tr>
                    <td><label for='tip'>Titlu: </label></td>
                    <td><input type='text' name="titlu" id="titlu" required=''></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type='submit' id='btn_sterge' value='Sterge'/></td>
                </tr>
            </table>
        </div>
    </div>
</body>

    <!-- This should stay at this position because I found no way of implementing HTML 5 upload support with JQuery -->
</html>
