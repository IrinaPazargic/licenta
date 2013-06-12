<?php
    require_once 'config.php';
$target_path = "images/";

$titlu=$_POST['titlu'];
$gen=$_POST['gen'];
$an=$_POST['an'];
$timp_desf=$_POST['timp_desf'];
$descriere=$_POST['descriere'];
$regia=$_POST['regia'];
$target_path_1 = $target_path . basename( $_FILES['uploadedfile']['name']);
$roluri_principale=$_POST['roluri_principale'];

$query="insert into filme (titlu, gen, an, timp_desf, descriere, regia, imagine, roluri_principale)
        values ('$titlu', '$gen', '$an', '$timp_desf', '$descriere', '$regia', '$target_path_1', '$roluri_principale')";
if(!mysql_query($query)){
    echo("fail");

}else{
    echo ("Inserted!!!");
}


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']).
        " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
?>