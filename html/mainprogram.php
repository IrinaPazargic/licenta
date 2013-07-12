<?php
require_once 'config.php';

$query = "SELECT idCinema, nume FROM cinema";
$rez = mysql_query($query);
//$rows = mysql_fetch_array($rez);

$rows = array();
while ($r = mysql_fetch_array($rez)) {
    $rows[$r['idCinema']] = $r['nume'];
}


?>
<link href="program.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        <?php
            foreach ($rows as $idCinema => $nume) :
        ?>
        $("#<?= $idCinema ?>").click(function () {
            $.ajax({
                type: "GET",
                url: "program.php?cinema=<?= $nume ?>",
                data: "",
                success: function (data) {
                    $('#main').html(data);
                }
            });
        });
        <?php
            endforeach;
        ?>
    });
</script>
<div id="main">
    <div id="selectCinema">
        <h2 style="background-color: orange; text-align: center;"> Rezervarile trebuie ridicate cu cel putin 30
            minute inainte de inceperea filmului, in caz contrar vor fi anulate.<br/>
            Pentru a evita aglomeratia de la case, va rugam sa ridicati rezervarile anticipat.</h2>
        <h3><strong>Selectati cinematograful:</strong></h3>
        <table style= "padding: 5px;" >
            <?php
            foreach ($rows as $idCinema => $nume) :
                ?>
                <tr >
                    <td style="text-align:left; width: 100px; ">
                        <p style= "border:1px solid black; background-color: #197419;"><a href="program.php?cinema=<?= $nume ?>" id="<?= $idCinema ?>" style="text-decoration:none; color: #CCCC00; font-size:1.3em; text-transform: uppercase;"> <?= $nume ?></a></p>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>
</div>