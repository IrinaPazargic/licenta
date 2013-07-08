<?php
   require_once 'config.php';

    $cinema = $_GET['cinema'];
    $idGen = $_GET['idGen'];
    $titlu = $_GET['titlu'];
    $data = $_GET['data'];
    var_dump($cinema);
    var_dump($idGen);
    var_dump($titlu);
    var_dump($data);

    $query_cauta = "
                    SELECT
                      p.idProgram, f.titlu, f.idGen, f.idFilm, p.ora, g.nume_gen
                    FROM
                      program p, filme f, cinema c, gen_film g
                    WHERE
                      p.idFilm = f.idFilm
                      AND f.idGen = g.id
                      AND p.idCinema = c.idCinema
                      AND c.nume='$cinema'
                      AND f.idGen='$idGen'
                      AND f.titlu='$titlu'
                      AND p.data='$data'
                    ";
    $rez_cauta = mysql_query($query_cauta);

     while ($row = mysql_fetch_array($rez_cauta)) {
        echo "
            <div class=\"det_prog\">
                <div class=\"leadin\">
                    <div class=\"info\" style=\"width:314px;\">
                        <p><b>${row['titlu']}</b></p>
                        <br/>
                        <em>${row['nume_gen']}</em>
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
