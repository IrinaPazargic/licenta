<?php
require_once 'model.php';
require_once 'config.php';

$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
$tomorrow= mktime(0,0,0,date("m"),date("d") + 1 ,date("Y"));
$day_after_tomorrow=mktime(0,0,0,date("m"),date("d") + 2 ,date("Y"));
$other_day= mktime(0,0,0,date("m"),date("d") + 3 ,date("Y"));
$other_day_1= mktime(0,0,0,date("m"),date("d") + 4 ,date("Y"));
$other_day_2= mktime(0,0,0,date("m"),date("d") + 5 ,date("Y"));
$other_day_3= mktime(0,0,0,date("m"),date("d") + 6 ,date("Y"));


$idCinema=$_GET['idCinema'];

$query_nume="select idCinema, nume from cinema where idCinema='$idCinema'";
$rez=mysql_query($query_nume);
$row_nume= mysql_fetch_assoc($rez);

$filme= new Filme();

function filme_data($data)
{

    $query = "
                SELECT
                    p.idProgram,f.idFilm, f.titlu, f.idGen, GROUP_CONCAT(p.ora SEPARATOR ', ') as ora, f.titlu
                FROM
                    program p, filme f, cinema c
                WHERE
                    p.idFilm = f.idFilm
                    AND p.idCinema = c.idCinema
                    AND data='$data'
                GROUP BY f.titlu
              ";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "
            <div class=\"det_prog\">
                <div class=\"leadin\">
                    <div class=\"info\" style=\"width:314px;\">
                        <p><b>${row['titlu']}</b></p>
                        <br/>
                        <em>${row['gen']}</em>
                        <p><br/><a href=\"filme.php?idFilm=${row['idFilm']}\">Detalii Film..</a></p>
                    </div>
                    <div class=\"rez_info\" style=\"width:190px;\">
                        <table>
                            <tr>
                            <td style=\"padding:0;margin:0;\">
                                <a class=\"btn_r\" href=\"ReservationPage.php?idProgram=${row['idProgram']}\" style=\"cursor:pointer; margin-top:5px;\"><span>R </span></a>${row['ora']}
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <hr/>
        ";
    }
}

function afisare_lista(){
    $idCinema=$_GET['idCinema'];
    $query = "
            SELECT
                p.idProgram, f.titlu, f.idFilm, f.idGen, p.ora, g.nume_gen
            FROM
                program p, filme f, cinema c, gen_film g
            WHERE
                p.idFilm = f.idFilm
                AND p.idCinema = c.idCinema
                AND f.idGen = g.id
                AND c.idCinema='$idCinema'
                AND data=CURDATE()
            ";
    $result = mysql_query($query);
    $rows=array();

    while ($row = mysql_fetch_array($result)) {
        $rows[$row['idProgram']] = $row['ora'];
       echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='?film=${row['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>";
                           foreach ($rows as $idProgram => $ora) :
                            echo "<td style='margin:0;'>
                                    <a style='text-decoration: none; margin-right:30px;' class='btn_r' href='ReservationPage.php?idProgram=$idProgram'       style='cursor:pointer; margin-top:5px;'>
                                <p style='color:white; margin-left: 20px;'>$ora</p></a></td>";
                            endforeach;
              echo "     </tr>
                    </table>
                </div>
                </div>
            </div><hr/> ";
    }

}

//cautare program in functie de data

function prgram_data(){
    $data=$_GET['data'];
    $query = "
            SELECT
                p.idProgram, f.titlu, f.idFilm, f.idGen, p.ora, g.nume_gen
            FROM
                program p, filme f, cinema c, gen_film g
            WHERE
                p.idFilm = f.idFilm
                AND p.idCinema = c.idCinema
                AND f.idGen = g.id
                AND data='$data'
            ";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='?film= ${row['titlu']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>
                            <td style='padding:0;margin:0;'>
                                <a style='text-decoration: none;' class='btn_r' href='ReservationPage.php?idProgram=${row['idProgram']}'  style='cursor:pointer; margin-top:5px;'>
                                <p style='color:white; margin-left: 20px;'>${row['ora']}</p></a>
                            </td>
                        </tr>

                    </table>
                </div>
                </div>
            </div><hr/> ";
    }

}

function cauta_film(){
    $cinema = $_GET['cinema'];
    $idGen = $_GET['idGen'];
    $titlu = $_GET['titlu'];
    $data = $_GET['data'];
    $query = "
            SELECT
                p.idProgram, f.titlu, f.idFilm, f.idGen, p.ora, g.nume_gen
            FROM
                program p, filme f, cinema c, gen_film g
            WHERE
                p.idFilm = f.idFilm
                AND  f.idGen = g.id
                AND p.idCinema = c.idCinema
                AND c.nume='$cinema'
                AND p.data='$data'
                AND f.idGen='$idGen'
                AND f.titlu='$titlu'
            ";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {
        echo "<div class='det_prog'>
                <div class='leadin'>
                    <div class='info' style=;width:314px;'>
                        <p><b>${row['titlu']}</b></p> <br/>
                        <p><em> ${row['nume_gen']}</em></p><br/>
                        <p><a href='filme.php?idFilm= ${row['idFilm']}'>Detalii Film..</a></p>
                    </div>
                <div class='rez_info' style='width:190px;'>
                    <table>
                        <tr>
                            <td style='padding:0;margin:0;'>
                                <a style='text-decoration: none;' class='btn_r' href='ReservationPage.php?idProgram=${row['idProgram']}'  style='cursor:pointer; margin-top:5px;'>
                                <p style='color:white; margin-left: 20px;'>${row['ora']}</p></a>
                            </td>
                        </tr>

                    </table>
                </div>
                </div>
            </div><hr/> ";
    }
}
?>
<div id="program_film">
                <h3><strong> Program - <?= $row_nume['nume']; ?> </strong></h3>
                <div id="menu_program">
                    <ul>
                        <li>
                            <?php for ($i = 0; $i < 7; $i++) :
                                $today = mktime(0, 0, 0, date("m"), date("d") + $i, date("Y"));
                                $today_show = date("Y/m/d", $today); ?>
                                <a class="current_data" id="<?= $today_show ?>" style="cursor: pointer;">
                                    <span><?= $today_show ?></span>
                                </a>
                            <?php endfor; ?>
                        </li>
                    </ul>
                </div>

                <div id="change">

                <?php  if(isset($_GET['idCinema']))
                            afisare_lista();
                        elseif (isset($_GET['cinema']) && isset($_GET['idGen'])&& isset($_GET['titlu']) && isset($_GET['data']))
                            cauta_film();
                        elseif (isset($_GET['data']))
                           program_data();?>

                </div>

           </div>