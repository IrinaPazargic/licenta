<?php
require_once'config.php';

$query="select idCinema, nume from cinema";
$result=mysql_query($query);
$row=mysql_fetch_array($result);

$judete =  array(
    "satuMare" => "Satu Mare",
    "maramures" => "Maramures",
    "suceava" => "Suceava",
    "botosani" => "Botosani",
    "bihor" => "Bihor",
    "salaj" => "Salaj",
    "cluj" => "Cluj",
    "bistritaNasaud" => "Bistrita Nasaud",
    "mures" => "Mures",
    "harghita" => "Harghita",
    "neamt" => "Neamt",
    "iasi" => "Iasi",
    "arad" => "Arad",
    "alba" => "Alaba",
    "sibiu" => "Sibiu",
    "hunedoara" => "Hunedoara",
    "brasov" => "Brasov",
    "covasna" => "Covasna",
    "bacau" => "Bacau",
    "vaslui" => "Vaslui",
    "galati" => "Galati",
    "vrancea" => "Vrancea",
    "timis" => "Caras Severin",
    "carasSeverin" => "Salaj",
    "gorj" => "Gorj",
    "valcea" => "Valcea",
    "arges" => "Arges",
    "dambovita" => "Dambovita",
    "prahova" => "Prahova",
    "buzau" => "Buzau",
    "braila" => "Braila",
    "mehedinti" => "Mehedinti",
    "dolj" => "Dolj",
    "olt" => "Olt",
    "teleorman" => "Teleorman",
    "giurgiu" => "Giurgiu",
    "ilfov" => "Bucuresti",
    "ialomita" => "Ialomita",
    "calarasi" => "Calarasi",
    "constanta" => "Constanta",
    "tulcea" => "Tulcea",

);
?>
<div>
    <ul id="map_block" class="mapRomania">
        <?php
        foreach ($judete as $class => $name) {
            $href = "#";
            if (existaCinemaInOras($name)) {
                $href = "program.php?cinema=$name";
                echo "<li class='ocupat'><a class='${class}' href='${href}'>$name<span class='effect'>&nbsp;</span></a></li>";
            } else {
                echo "<li><a class='${class}' href='${href}'>$name</a></li>";
            }
        }

        function existaCinemaInOras($numeCinema)
        {
            $query = "SELECT nume FROM cinema WHERE nume = '$numeCinema'";
            $result = mysql_query($query);
            return mysql_num_rows($result) == 1;
        }
        ?>
    </ul>
</div>


