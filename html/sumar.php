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
?>

<table cellspacing="0" cellpadding="0" style="width:100%; border-width:0px;">
    <tr>
        <td>
            <p>
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td valign="top" align="left">
                        <img style="border-width:0px;" src="images/Step1.jpg">
                        <img style="border-width:0px;" src="images/Step2.jpg">
                        <img style="border-width:0px;" src="images/OnStep3.jpg">
                        <img style="border-width:0px;" src="images/Step4.jpg">
                    </td>
                    <td valign="top" align="right"></td>
                </tr>
                <tr>
                    <td align="left">
                        <span>FORMULAR DE COMANDA</span>
                    </td>

                </tr>
                <tr>
                    <td align="center" style="padding-left:10px;padding-top:10px; padding-right:10px;">
                        <span>Biletele pe care le-ati selectat vor fi pastrate pana la 30 de minute inainte de inceperea spectacolului. Dupa aceasta perioada, aceste bilete vor putea fi cumparate de alte persone.Va recomandam sa va ridicati rezervarile cu cel putin 30 de minute inainte de spectacol.</span>
                    </td>
                </tr>
                </tbody>
            </table>
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <form method="post" name="detailsForm">
                <table width="35%">
                    <tr>
                        <td width="100%;"><span>Detaliile dumneavoastra<?= $rezervare->film;?>></span></td>
                    </tr>
                    <tr>
                        <td>
                            <div>Prenume</div>
                            <span>*</span></td>
                        <td><input type="text" name="prenume" id="prenume"></td>
                    </tr>
                    <tr>
                        <td>
                            <div>Nume</div>
                            <span>*</span></td>
                        <td><input type="text" name="nume" id="nume"></td>
                    </tr>
                    <tr>
                        <td>
                            <div>Telefon</div>
                            <span>*</span></td>
                        <td><input type="text" name="telefon" id="telefon"></td>
                    </tr>

                    <tr>
                        <td>
                            <div>E-mail</div>
                            <span>*</span></td>
                        <td><input type="text" name="email" id="email"></td>
                    </tr>
                </table>
            </form>
            <span> * = Camp obligatoriu!</span>
        </td>
    </tr>

    <tr>
        <td align="right" style="padding-top:10px;">
            <a href="ReservationPage2.php"><input style="border-width:0px; color:transparent;" type="image"
                                                  src="images/BackButton.jpg"/></a>
            <button id="next"><input style="border-width:0px;" type="image"/></button>
        </td>
    </tr>
</table>
