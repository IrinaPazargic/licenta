<?php
require_once 'model.php';
require_once 'config.php';

$rezervare = $_SESSION['rezervare'];
$locuri = $_GET['locuri'];
$rezervare->locuri = $locuri;
$_SESSION['rezervare'] = $rezervare;
?>

<html>
<head>
    <link href="reservation.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/validate_functions.js" ></script>
    <script>
        function validate(form) {
            var fail = validateNume(form.nume.value)
            fail += validatePrenume(form.prenume.value)
            fail += validateTelefon(form.telefon.value)
            fail += validateEmail(form.email.value)
            if (fail == "")  {
                return true;
            } else {
                alert(fail);
                return false;
            }
        }
    </script>
    <script>
        $(document).ready(function () {
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
</head>
<body>
	<div id="content">
        <table cellspacing="0" cellpadding="0" style="width:100%; border-width:0px;">
            <tr>
                <td>
                    <p>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>

                                    <td valign="top" align="right"></td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <span>FORMULAR DE COMANDA</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-left:10px;padding-top:10px; padding-right:10px;" >
                                        <span>Biletele pe care le-ati selectat vor fi pastrate pana la 30 de minute inainte de inceperea spectacolului. Dupa aceasta perioada, aceste bilete vor putea fi cumparate de alte persone.Va recomandam sa va ridicati rezervarile cu cel putin 30 de minute inainte de spectacol.
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <form method="post" name="detailsForm" onSubmit="return validate(this);">
                        <table width="35%">
                            <tr>
                                <td width="100%;">
                                    <span>Detaliile dumneavoastra</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Prenume</div>
                                    <span>*</span>
                                </td>
                                <td>
                                    <input type="text" name="prenume" id="prenume" required=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Nume</div>
                                    <span>*</span>
                                </td>
                                <td>
                                    <input type="text" name="nume" id="nume" required=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Telefon</div>
                                    <span>*</span>
                                </td>
                                <td>
                                    <input type="text" name="telefon" id="telefon" required=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>E-mail</div>
                                    <span>*</span>
                                </td>
                                <td>
                                    <input type="text" name="email" id="email" required=""/>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="padding-top:10px;">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div style="width:100%">
                        <span> * = Camp obligatoriu!</span>
<!--                        <input type="submit" id="previous" value="Inapoi"/>-->
                        <input type="submit" id="next" style="margin-right: 0px;" value="Next" />
                    <div>
                </td>
            </tr>
        </table>
	</div>
</body>
</html>
