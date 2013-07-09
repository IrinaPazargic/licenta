<?php
require_once 'config.php';

function all_films()
{
    $query = "SELECT f.idFilm, f.titlu, f.idGen,f. descriere, g.nume_gen, f.regia, f.imagine
              FROM filme f, gen_film g WHERE f.idGen=g.id";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        echo "<div class='newsList'>
                <span class='icon_hold'>
                    <img id='image' src='${row['imagine']}'>
                </span>
                <h4 >Titlu: ${row['titlu']}</h4>
                <p><strong>Gen: ${row['nume_gen']}</strong></p> <br/>
                <hr/>
                <p>
                    Regia: ${row['regia']} <br/>
                    ${row['descriere']} <br/>
                    <a id='check' href='?film=${row['titlu']}' class='detailsLink'>
                        Detalii film
                    </a>
                 </p>
             </div>";
    }
}

function filme_gen()
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
                <p> <a href='?film=${row['titlu']}' class='detailsLink'>Detalii film..</a></p>
                </div> ";
    }
}


?>
<span class="icon_hold">
    <img id="image" src="images/newspaper.png">
</span>
<h3><strong>Filme</strong></h3>
<?php
    if(isset($_GET['idGen'])){
        filme_gen();
    }
    else{
        all_films();
    }
?>
