<?php
require_once 'config.php';

function all_films()
{

    $query = "SELECT f.idFilm, f.titlu, f.idGen,f. descriere, g.nume_gen, f.regia, f.imagine FROM filme f, gen_film g WHERE f.idGen=g.id";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "<div class='newsList'>
                <span class='icon_hold'>
                    <img id='image' src=${row['imagine']}/>
                </span>
                <h4 >Titlu: ${row['titlu']}</h4>
                <p><strong>Gen: ${row['nume_gen']}</strong></p> <br/>
                <hr class='copyright'>
                <p class='copyright'>
                        Regia: ${row['regia']} <br/>
                        ${row['descriere']} <br/>
                        <a id='check' href='?idFilm= ${row['idFilm']} class='detailsLink]>
                            Detalii film
                        </a>
                 </p>
             </div>";
    }
}
function filme()
{
    $idGen = $_GET['idGen'];
    $query = "SELECT f.idFilm, f.titlu, f.idGen, g.nume_gen
             FROM filme f, gen_film g
             WHERE g.id=f.idGen AND  f.idGen='$idGen'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "<div class='newsList'>
                <p style='margin-top:5px; margin-left:5px;'>
                    <b>${row['titlu']}</b>
                </p><br/>
                <em style='margin-left:5px;'>
                    ${row['nume_gen']}
                </em></br>
                <p> <a id='check' href='?idFilm=${row['idFilm']}' class='detailsLink'>Detalii film</a></p>
                </div> ";
    }
}


function detalii_film()
{
    $idFilm = $_GET['idFilm'];
    $query = "SELECT
                p.idProgram, f.imagine, f.titlu, f.gen, f.regia, f.roluri_principale, f.timp_desf, f.descriere
              FROM filme f, program p, cinema c
              WHERE  p.idFilm=f.idFilm AND p.idCinema=c.idCinema AND f.idFilm='$idFilm'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "<div class='newsList'>
                <span class='icon_hold'>
                    <img id='image' src='${row['imagine']}'>
                </span>
                <h4 >Titlu: ${row['titlu']}</h4>
                <p><strong>Gen:  ${row['gen']}
                    </strong></p><br/>
                <hr class='copyright'>
                <p class='copyright'>Regia: ${row['regia']} <br/>
                    Detalii: ${row['descriere']}<br/>
                    Timp desfasurare: ${row['timp_desf']} minute<br/>
                    Roluri principale: ${row['roluri_principale']}
                </p>
                <a  href='program.php?idCinema=100'>Rezerva Galati</a><br/>
                <a href='program.php?idCinema=101'>Rezerva Bucuresti</a>
              </div>";
    }
}


?>
<span class="icon_hold">
    <img id="image" src="images/newspaper.png">
</span>
<h3><strong>Filme</strong></h3>
<?php
    if(isset($_GET['idGen'])){
        filme();
    }else {
        all_films();
    }

?>
