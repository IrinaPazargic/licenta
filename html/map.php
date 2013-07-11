<?php
require_once'config.php';

$query="select idCinema, nume from cinema";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$rows=array();

?>
<script src="script/meniuri.js"></script>
<span class="icon_hold">
                <img id="images" src="">
            </span>
<h3><strong>Cinema-ul tau</strong></h3>
<div>
    <ul id="map_block" class="mapRomania">
        <li><a class="satuMare" href="#">Satu Mare</a></li>
        <li><a class="maramures" href="#">Maramures</a></li>
        <li><a class="suceava" href="#">Suceava</a></li>
        <li><a class="botosani" href="#">Botosani</a></li>
        <li><a class="bihor" href="#">Bihor</a></li>
        <li><a class="salaj" href="#">Salaj</a></li>
        <li><a class="cluj" href="#">Cluj<span class="effect">&nbsp;</span></a></li>
        <li><a class="bistritaNasaud" href="#">Bistrita Nasaud</a></li>
        <li><a class="mures" href="#">Mures</a></li>
        <li><a class="harghita" href="#">Harghita</a></li>
        <li><a class="neamt" href="#">Neamt</a></li>
        <li><a class="iasi" href="#">Iasi</a></li>
        <li><a class="arad" href="#">Arad</a></li>
        <li><a class="alba" href="#">Alaba</a></li>
        <li><a class="sibiu" href="#">Sibiu</a></li>
        <li><a class="hunedoara" href="#">Hunedoara</a></li>
        <li><a class="brasov" href="#">Brasov</a></li>
        <li><a class="covasna" href="#">Covasna</a></li>
        <li><a class="bacau" href="#">Bacau</a></li>
        <li><a class="vaslui" href="#">Vaslui</a></li>
        <li class="ocupat"><a id="program_galati" class="galati" href="?cinema=<?= $row['nume']?>">Galati<span
                    class="effect">&nbsp;</span></a></li>
        <li><a class="vrancea" href="#">Vrancea</a></li>
        <li><a class="timis" href="#">Timis</a></li>
        <li><a class="carasSeverin" href="#">Caras Severin</a></li>
        <li><a class="gorj" href="#">Gorj</a></li>
        <li><a class="valcea" href="#">Valcea</a></li>
        <li><a class="arges" href="#">Arges</a></li>
        <li><a class="dambovita" href="#">Dambovita</a></li>
        <li><a class="prahova" href="#">Prahova</a></li>
        <li><a class="buzau" href="#">Buzau</a></li>
        <li><a class="braila" href="#">Braila</a></li>
        <li><a class="mehedinti" href="#">Mehedinti</a></li>
        <li><a class="dolj" href="#">Dolj</a></li>
        <li><a class="olt" href="#">Olt</a></li>
        <li><a class="teleorman" href="#">Teleorman</a></li>
        <li><a class="giurgiu" href="#">Giurgiu</a></li>
        <li class="ocupat"><a id=""class="ilfov" href="?cinema=Bucuresti">Ilfov<span class="effect">&nbsp;</span></a>
        </li>
        <li><a class="ialomita" href="#">Ialomita</a></li>
        <li><a class="calarasi" href="#">Calarasi</a></li>
        <li><a class="constanta" href="#">Constanta</a></li>
        <li><a class="tulcea" href="#">Tulcea</a></li>
    </ul>
</div>
