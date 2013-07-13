<?php
require_once 'model.php';
require_once 'config.php';

$rezervare = $_SESSION['rezervare'];
$locuri = $_GET['locuri'];
$rezervare->locuri = $locuri;
$_SESSION['rezervare'] = $rezervare;
?>

<link href="reservation.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="script/validate_functions.js"></script>
<script>
    function validate(form) {
        form.preventDefault();

        var fail = validateNume(form.nume.value)
        fail += validatePrenume(form.prenume.value)
        fail += validateTelefon(form.telefon.value)
        fail += validateEmail(form.email.value)
        if (fail == "") {
            return true;
        } else {
            alert(fail);
            return false;
        }
    }
</script>
<script>
    $(function () {
        $("#next").click(function () {
            var nume = $("#nume").val();
            var prenume = $("#prenume").val();
            var email = $("#email").val();
            var telefon = $("#telefon").val();
            $.ajax({
                type: "GET",
                url: "sumar.php",
                data: "nume=" + nume + "&prenume=" + prenume + "&email=" + email + "&telefon=" + telefon,
                success: function (result) {
                    console.log('success: ' + result);
                    $("#content").html(result);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<div id="content">
    <table cellspacing="0" cellpadding="0" style="width:100%; border-width:0px;">
        <tr>
            <td>
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td valign="top" align="left">
                            <ul style="float:left; list-style-type: none;">
                                <li>Pasul 1</br>  Alegeti filmul</li>
                                <li>Pasul 2 </br>  Alegeti biletele</li>
                                <li>Pasul 3 </br> Alegeti locurile</li>
                                <li style="color:red;">Pasul 4 </br> Completati formularul</li>
                                <li>Pasul 5 </br>  Confirmare rezervare</li>

                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <span>FORMULAR DE COMANDA</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-left:10px;padding-top:10px; padding-right:10px;">
                                        <span>Biletele pe care le-ati selectat vor fi pastrate pana la 30 de minute inainte de inceperea spectacolului. Dupa aceasta perioada, aceste bilete vor putea fi cumparate de alte persone.Va recomandam sa va ridicati rezervarile cu cel putin 30 de minute inainte de spectacol.
                                        </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                    <table width="35%">
                        <tr>
                            <td width="100%;">
                                <span>Detaliile dumneavoastra</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>Prenume   <span>*</span></div>
                            </td>
                            <td>
                                <input type="text" name="prenume" id="prenume"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>Nume<span>*</span></div>
                            </td>
                            <td>
                                <input type="text" name="nume" id="nume"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>Telefon <span>*</span></div>
                            </td>
                            <td>
                                <input type="text" name="telefon" id="telefon"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>E-mail  <span>*</span></div>
                            </td>
                            <td>
                                <input type="text" name="email" id="email"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span> * = Camp obligatoriu!</span>
                            </td>
                        </tr>

                    </table>

            </td>

        </tr>
        <tr>
            <td style="text-align: right;">
                <input type="submit" id="next" style="margin-right: 5px; width:100px;" value="Next"/
            </td>
        </tr>
    </table>
</div>
