<?php
    require_once 'model.php';
    require_once 'config.php';

    $query = "
                SELECT tip, pret FROM reduceri order by tip
                ";
    $rez = mysql_query($query);
    $rez1 = mysql_query($query);

    $idx = 0;
    $tipReduceri = array();
    while($row = mysql_fetch_array($rez1)) {
        $a = ++$idx;
        $index = "red${a}";
        $tipReduceri[$index] = new TipReducere($row['tip'], $row['pret']);
    }

    $rezervare = detalii_rezervare();

    $_SESSION['rezervare'] = $rezervare;

    $_SESSION['tipReduceri'] = $tipReduceri;

	function detalii_rezervare(){
		$idProgram=$_GET['idProgram'];
		$query="
                select
		            f.titlu, p.data, p.ora, c.nume, s.nr_sala
                from program p, filme f, cinema c, sali s
                where p.idFilm=f.idFilm
                and c.idCinema=p.idCinema
                and p.idSala=s.idSala
                and p.idProgram='$idProgram'
                ";

		$result=mysql_query($query);
        $row = mysql_fetch_object($result);
        $rezervare = new Rezervare();
        $rezervare->idProgram = $idProgram;

        $rezervare->film = $row->titlu;
        $rezervare->cinema = $row->nume;
        $rezervare->data = $row->data;
        $rezervare->ora=$row->ora;
        $rezervare->sala=$row->nr_sala;

        return $rezervare;
    }
?>

<html>
<head>
<link href="reservation.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#next").click(function () {
            var nextPageUrl = "ReservationPage2.php?";
            var validInput = false;
            $('select[id^="redurecere_"] :selected').each(function(idx, value) {
                var nrBilete = $(value).text();
                var validInput2 = nrBilete > 0;
                validInput = validInput || validInput2;
                nextPageUrl += "red" + ++idx + "=" + nrBilete + "&"
            });
            nextPageUrl = nextPageUrl.substr(0, nextPageUrl.length - 1);
            if (validInput === false) {
                alert("Nu ati selectat biletele.Va rugam alegeti biletele!");
            } else {
                $("#content").load(nextPageUrl);
            }
        });
    });
</script>
<style type="text/css">
    li {
        float:left;
        font-size: 0.8em;
        margin-left:5px;
        bordeR:1px solid red;
    }

    </style>
</head>
<body>
	<div id="content">
	<table cellspacing="0" cellpadding="0" style="width:100%; border-width:0px;">
			<tr>
				<td>
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
								<tr>
                                    <td valign="top" align="left">
                                        <ul style="float:left; list-style-type: none;">
                                            <li>Pasul 1</br>  Alegeti filmul</li>
                                            <li style="color:red;">Pasul 2 </br>  Alegeti biletele</li>
                                            <li>Pasul 3 </br> Alegeti locurile</li>
                                            <li>Pasul 4 </br> Completati formularul</li>
                                            <li>Pasul 5 </br>  Confirmare rezervare</li>

                                        </ul>
                                   </td>
								</tr>
								<tr>
									<td align="left">
									<span >Selectati biletele</span>
									</td>
								</tr>
								
								<tr>
									<td align="left">
										<div id="results">
                                           <span>Filmul: <?= $rezervare->film;?></span><br/>
                                            <span> Data: <?= $rezervare->data;?></span></br>
                                            <span>Ora : <?= $rezervare->ora;?></span></br>
                                            <span>Cinematograful: <?= $rezervare->cinema;?></span></br>
                                            <span>Sala : <?= $rezervare->sala ?></span>

										</div>
									</td>
								</tr>
						</table>
				</td>
			</tr>
			
			<tr>
				<td align="left">
				<p>
					<table style="width:90%; border: 1px solid black; border-collapse:collapse; background-color:gray; color:white; margin:0 auto;"  >
							<tr style=" font-size: 12px; text-shadow: 0.01em 0.01em 0.01em #000000;">
								<th style="border: 1px solid black;">
									&nbsp;
								</th>
								<th style=" border: 1px solid black;color: red;font-family: Verdana,Arial,Helvetica,sans-serif;text-shadow: 0.01em 0.01em 0.01em #000000;text-align:left;" >
									Tip
								</th>
								<th style=" border: 1px solid black;color: red;font-family: Verdana,Arial,Helvetica,sans-serif;text-shadow: 0.01em 0.01em 0.01em #000000;text-align:left;" >
									Pret
								</th>
								<th style=" border: 1px solid black;color: red;font-family: Verdana,Arial,Helvetica,sans-serif;text-shadow: 0.01em 0.01em 0.01em #000000;text-align:left;" >
									Cantitate
						   		</th>
				            </tr>
                            <?php
                                $idx = 0;
                                while($row = mysql_fetch_array($rez)) :
                            ?>
							<tr>
								<td style="border: 1px solid black;">&nbsp;</td>
								<td id="tip1" style="border: 1px solid black;">
								<span ><?= $row['tip'] ?></span>
								</td>
								<td id="pret1" style="border: 1px solid black;">
								<span ><?= $row['pret']?> Lei</span>
								</td>
								<td style="border: 1px solid black;">
								<select id="redurecere_<?= ++$idx ?>"  class="numbers">
                                        <option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
								</select>
								</td>
							</tr>
                            <?php endwhile; ?>
					</table>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
			</tr>
	
			<tr >
				<td align="right" style="padding-top:10px;">
					<input type="submit" id="next" value="Pasul Urmator"/>

				</td>
			</tr>
	</table> 
	</div>
</body>
</html>
