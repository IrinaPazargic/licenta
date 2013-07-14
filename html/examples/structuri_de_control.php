<?php
$topPosition = 10;
for ($rand = 1; $rand <= 12; $rand++) {
    $leftPosition = 50;
    for ($loc = 1; $loc <= 14; $loc++) {
        $scaun = $rand . '_' . $loc;
        $imagine = imagineaInFunctieDeInformatiaDeRezervare($scaun);
        $esteCuloar = esteCuloar($rand, $loc);
        $visibility = $esteCuloar ? "hidden" : "visible";
        echo "
            <div id='${scaun}' class='seat'
             style='visibility:${visibility}'; top:${topPosition}px;
             left:${leftPosition}px; background-image:url(${imagine});'></div>
            <br/>
        ";
        $leftPosition = $leftPosition + 30;
    }
    $topPosition =+ $topPosition + 30;
    echo "topPosition = " . $topPosition;
}

function imagineaInFunctieDeInformatiaDeRezervare($scaun)
{
    return 'images/SeatGreen.png';
}

function esteCuloar($rand, $loc)
{
    if (($rand === 1 || $rand === 2 || $rand === 3) &&
        ($loc === 6 || $loc === 7 || $loc === 6 || $loc === 9)
    ) {
        return true;
    }
    return false;
}



