
<html>
<head>
<title>Registration Page</title>
<link href="register.css" rel="stylesheet" type="text/css"/>
    <script src="validate_functions.js" ></script>
    <script>
        function validate(form) {
            fail = validateNume(form.nume.value)
            fail += validatePrenume(form.prenume.value)
            fail += validateAdresa(form.adresa.value)
            fail += validatePassword(form.password.value)
            fail += validateUsername(form.username.value)
            fail += validateTelefon(form.telefon.value)
            fail += validateEmail(form.email.value)
            if (fail == "") return true
            else { alert(fail); return false }
        }
    </script>
</head>
<body>
<div id="content">
<ul>
    <li><a id="logon" class="current" href="register.php">Log on</a></li>
    <li><a id="login" href="login.php">Log in</a></li>

</ul>
<div style="clear:both;" id="form">
    <form action="inregistrare.php" id="register-form" method="post" onSubmit="return validate(this)" >
            <fieldset>
                <legend>Pagina de inregistrare</legend>
                <p><label for="nume">Nume: </label>
                <input type="text" name="nume" maxlength="32"></p>
                <p><label for="prenume">Prenume: </label>
                <input type="text" name="prenume" maxlength="32"></p>
                <p><label for="email">E-mail: </label>
                <input type="text" name="email"  maxlength="64"></p>
                <p><label for="tel">Telefon: </label>
                <input type="text" name="telefon"   maxlength="11"></p>
                <p><label for="adresa">Adresa: </label>
                <input type="text" name="adresa"   maxlength="50"></p>
                <p><label for="username">Username: </label>
                <input type="text" name="username" maxlength="16" ></p>
                <p><label for="password">Password: </label>
                <input type="input" name="password"  maxlength="12"></p>
                <input type="submit" id="button" value="Register"/>
            </fieldset>
    </form>
</div>
</div> <!--content-->
</body>
</html>