<?php
require_once 'model.php';
require_once 'config.php';

$rezervare = $_SESSION['rezervare'];

$persoana = new Persoana();
$persoana->nume = $_GET['nume'];
$persoana->prenume = $_GET['prenume'];
$persoana->email = $_GET['email'];
$persoana->telefon = $_GET['telefon'];

$rezervare->persoana = $persoana;


$_SESSION['rezervare'] = $rezervare;

var_dump($_SESSION['rezervare']);

$nrBilete = 0;

$pretBilete=0;


foreach ($rezervare->locuri as $key => $value) {
    $nrBilete += $value->nrLocuri;
}

foreach ($rezervare->locuri as $key => $value) {
    $pretBilete += $value->pret;
}





?>
<html>
<head>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
          $("#submit").click(function () {

              $("#rezerva").load("rezerva.php");
          });
      });
</script>
</head>
<body>
<div id="rezerva">	<img style="border-width:0px;" src="images/Step1.jpg">
	    <img style="border-width:0px;" src="images/Step2.jpg">
		<img style="border-width:0px;" src="images/Step3.jpg">
		<img style="border-width:0px;" src="images/OnStep4.jpg"></div>
<h3>VERIFICATI COMANDA DUMNEAVOASTRA</h3>
<span style="text-align: center;">Biletele pe care le-ati selectat vor fi pastrate pana la 30 de minute inainte de inceperea spectacolului. Dupa aceasta perioada, aceste bilete vor putea fi cumparate de alte persone.Va recomandam sa va ridicati rezervarile cu cel putin 30 de minute inainte de spectacol.</span>
<div>

<table style="width: 100%; padding: 3px; border:2px solid white;">
    <tbody>
        <tr>
            <td><strong><em>Informatii despre eveniment</em></strong></td>
        </tr>
        <tr style="padding:3px;">
            <td style="width:100px;">Eveniment</td>
            <td><?= $rezervare->data?></td>
            <td> <?= $rezervare->ora?></td>
            <td>Sala: <?=  $rezervare->sala?></td>
            <td><strong><?=  $rezervare->film ?></strong></td>
        </tr>
        <tr style="padding:3px;">
            <td style="width:100px;">Amplasament</td>
            <td><?= $rezervare->cinema ?></td>
        </tr>

        <tr style="padding:3px;">
           <td><strong><em>Informatii despre bilet</em></strong></td>

        </tr>




        <tr style="padding:3px;">
              <td>Eveniment</td>
              <td>Tipul biletului</td>
              <td>Cantitate</td>
               <td>Pret Bilet</td>

        </tr>
    <?php foreach ($rezervare->locuri as $key => $value) {
        if($value->nrLocuri != 0) {?>
        <tr style="padding:3px;">
            <td></td>
            <td><?= $value->tip;?></td>
            <td><?= $value->nrLocuri;?></td>
            <td><?= $value->pret;?> Lei </td>
        </tr>
   <?php }}?>

        <tr style="padding:3px;">
            <td>Total bilete</td>
            <td></td>
            <td><?= $nrBilete?> </td>
            <td>Total: <?= $pretBilete ?> Lei</td>

        </tr>
        <tr style="padding:3px;">

        <td><strong><em>Informatii despre locuri</em></strong></td>
        </tr style="padding:3px;">
        <tr style="padding:3px;">
            <td>Eveniment</td>
            <td>Sala</td>
            <td>Locuri</td>
        </tr>
        <tr style="padding:3px;">
                 <td></td>
                 <td><?=  $rezervare->sala?></td>
                 <td></td>
         </tr>
        <tr style="padding:3px;">
               <td><strong><em>Informatii despre dumneavoastra</em></strong></td>
        </tr>
        <tr style="padding:3px;">
               <td>Nume</td>
               <td><?= $persoana->prenume, $persoana->nume ?></td>
        </tr>
        <tr style="padding:3px;">
               <td>E-mail</td>
               <td><?= $persoana->email?></td>
        </tr>
        <tr style="text-align: right;">
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" value="Rezerva" id="submit"></td>
        </tr>
    </tbody>
</table>
</div>
</body>
</html>
