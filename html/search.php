<?php
   require_once 'config.php';

$cinema = $_GET['cinema'];
$categorie = $_GET['categorie'];
$titlu = $_GET['titlu'];
$data = $_GET['data'];

$query_cauta = "
                select
                  p.idProgram, f.titlu, f.gen
                from
                  program p, filme f, cinema c
                where
                  p.idFilm = f.idFilm
                  and p.idCinema = c.idCinema
                  and c.nume='$cinema'
                  and f.gen='$categorie'
                  and f.titlu='$titlu'
                  and p.data='$data'
                ";
$rez_cauta = mysql_query($query_cauta);

while ($row_nume=mysql_fetch_array($rez_cauta)) {
        echo "
            <div class='det_prog'>
                ${row_nume['titlu']}
            </div>
        ";
}