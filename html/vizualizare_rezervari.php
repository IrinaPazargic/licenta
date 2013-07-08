<?php
require_once 'model.php';
require_once 'config.php';

?>
<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
    <link href="operatii.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/vizualizare_rezervari.js"></script>
</head>
<body>
<div id="content">
    <div>
        <em>MyCinema City</em>
    </div>
    <p><span>Administrator: <?= $_SESSION['username'] ?> </span></p>

    <div id="nav" style="clear:right;">
        <ul>
            <li><a id="detalii">Detalii cont</a></li>
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
                <li class="right_menu">
                    <a id="cauta_rezervare" style="background-color:  #B2C09C;" href="rezervari.php">Cauta rezervare</a>
                </li>
                <li class="right_menu">
                    <a id="vizualizare" style="background-color:#d4d4d4;">Vizualizare rezervari</a>
                </li>
            </ul>
            <div id="change" style="width: 500px; float:left;">
                <fieldset>
                    <table>
                        <tr>
                            <td><label for="email">E-mail: </label></td>
                            <td><input type="text" id="email" name="email"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" id="btn_cauta" value="Vizualizare"/></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div id="rezultat" style="clear:both;"></div>
        </div>
    </div>
</div>
</body>
</html>
