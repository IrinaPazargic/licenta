<?php
require_once 'model.php';
require_once 'config.php';

$sali = new Sali();
$query = "SELECT idSala FROM sali";
$rez = mysql_query($query);
?>
<html>
<head>
    <link href="administrator.css" rel="stylesheet" type="text/css"/>
    <link href="operatii.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        function cautaProgram() {
            var ajaxRequest;  // The variable that makes Ajax possible!
            try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            } catch (e) {
                // Internet Explorer Browsers
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.
            ajaxRequest.onreadystatechange = function () {
                if (ajaxRequest.readyState == 4) {
                    var ajaxDisplay = document.getElementById('rezultat');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }
            // Now get the value from user and pass it to
            // server script.
            var titlu = document.getElementById('titlu').value;
            var data = document.getElementById('data').value;
            var ora = document.getElementById('ora').value;
            var queryString = "?titlu=" + titlu + "&data=" + data + "&ora=" + ora;
            ajaxRequest.open("GET", "cauta_program.php" +
                queryString, true);
            ajaxRequest.send(null);
            $("#rezultat").show();
        }
        function deleteProgram() {
            $.ajax(
                {
                    type: "POST",
                    url: "sterge_program.php",
                    dataType: "html",
                    success: function (result) {
                        if (result == "Ok") {
                            alert("Stergere realizata cu succes");
                        } else {
                            alert("Eroare: " + result);
                        }
                    }
                });
            $("#rezultat").show();
        }
        $(document).ready(function () {
            // $("#rezultat").hide();
            $("#cauta").click(function () {
                document.getElementById("table_program").innerHTML = '<tbody><tr><td><label for="titlu">Titlu: </label></td><td><input type="text" name="titlu" id="titlu"></td></tr>' +
                    '<tr><td><label for="data">Data: </label>' +
                    '</td><td><input type="text" name="data" id="data"></td></tr>' +
                    '<tr><td><label for="ora">Ora: </label>' +
                    '</td><td><input type="text" name="ora" id="ora"></td></tr>' +
                    '<tr><td></td><td></td><td><input type="submit" id="search" name="Search" onclick="cautaProgram()" value="Cauta"/></td></tr> </tbody>';
                document.getElementById('cauta').style.backgroundColor = 'red';
                if ((document.getElementById('sterge').style.backgroundColor = 'red') && (document.getElementById('inregistrare').style.backgroundColor = 'red')) {
                    document.getElementById('sterge').style.backgroundColor = 'gray';
                    document.getElementById('inregistrare').style.backgroundColor = 'gray';
                }
            });
            $("#inregistrare").click(function () {
                if ((document.getElementById('sterge').style.backgroundColor = 'red') && (document.getElementById('cauta').style.backgroundColor = 'red')) {
                    document.getElementById('sterge').style.backgroundColor = 'gray';
                    document.getElementById('cauta').style.backgroundColor = 'gray';
                }
            });
            $("#sterge").click(function () {
                document.getElementById("table_program").innerHTML = '<tbody><tr><td><label for="titlu">Titlu: </label></td><td><input type="text" id="titlu"></td></tr>' +
                    '<tr><td><label for="data">Data: </label></td><td><input type="text" id="data name="data"></td></tr>' +
                    '<tr><td><label for="ora">Ora: </label></td><td><input type="text" id="ora" name="ora"></td></tr>' +
                    '<tr><td><label for="cine">Cinematograful: </label></td><td><input type="text" id="cinematograful" name="cinematograful"></td></tr>' +
                    '<tr><td></td><td></td><td><input type="submit" id="delete" onclick="deleteProgram()" name="delete" value="submit"/></td></tr> </tbody>';
                document.getElementById('sterge').style.backgroundColor = 'red';
                if ((document.getElementById('cauta').style.backgroundColor = 'red') && ((document.getElementById('inregistrare').style.backgroundColor = 'red'))) {
                    document.getElementById('cauta').style.backgroundColor = 'gray';
                    document.getElementById('inregistrare').style.backgroundColor = 'gray';
                }
            });
        });
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
                    <li id="current" class="right_menu"><a id="program" href="operatii_program.php">Programe</a></li>
                    <li class="right_menu"><a id="reduceri" href="operatii_reduceri.php">Reduceri</a></li>
                    <li class="right_menu"><a id="sali">Sali</a></li>
                </ul>
                <div style="width: 500px; float:left;">
                    <fieldset>
                        <legend><a id="inregistrare" href="operatii_program.php" style="background-color: red; text-decoration: none; color:black;"><span>Inregistrare program</span></a>
                        <a id="cauta" style="background-color: gray;"><span>Cauta in program</span></a>
                        <a id="sterge" style="background-color: gray;"><span>Sterge program</span></a></legend>
                        <table id="table_program">
                            <tbody>
                                <tr>
                                    <td><label for="titlu">Titlu: </label></td>
                                    <td><input type="text" name="titlu"></td>
                                </tr>
                                <tr>
                                    <td><label for="cinema">Cinematograful: </label></td>
                                    <td><input type="text" name="cinema"></td>
                                </tr>
                                <tr>
                                    <td><label for="data">Data: </label></td>
                                    <td><input type="text" name="data"></td>
                                </tr>
                                <tr>
                                    <td><label for="ora">ora: </label></td>
                                    <td><input type="text" name="ora"></td>
                                </tr>
                                <tr>
                                    <td><label for="sala">Sala: </label></td>
                                    <td>
                                        <select name="sala"><?php
                                        while($row=mysql_fetch_object($rez)) {
                                                $sali->nr_sala=$row;
                                        foreach($row as $value){ ?>
                                            <option value="<?= $value ?>"><?= $value?></option>

                                            <?php } }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" id="salveaza" name="salveaza" value="Salveaza"/></td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                <div id="rezultat" style="clear:both">Ina</div>
            </div>
        </div>
    </div>
</body>
</html>

