<html>
<head>
<title>Registration Page</title>
<link href="register.css" rel="stylesheet" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="script/validate_functions.js" ></script>
<!--    <script src="script/inserts.js"></script>-->
    <script src="script/administrator.js" ></script>
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
    </script>-->
</head>
<body>
<div id="content">
<ul>
    <li><a id="logon" class="current" href="register.php">Log on</a></li>
    <li><a id="login" href="login.php">Log in</a></li>

</ul>
<div style="clear:both;" id="form">
   <form  action="inregistrare_admin.php" id="register-form" method="post" onSubmit="return validate(this)">
            <fieldset>
                <legend>Pagina de inregistrare</legend>
                <p><label for="nume">Nume: </label>
                <input type="text" name="nume" id="nume"></p>
                <p><label for="prenume">Prenume: </label>
                <input type="text" name="prenume" id="prenume"></p>
                <p><label for="email">E-mail: </label>
                <input type="text" name="email" id="email"></p>
                <p><label for="tel">Telefon: </label>
                <input type="text" name="telefon" id="telefon"></p>
                <p><label for="adresa">Adresa: </label>
                <input type="text" name="adresa"  id="adresa"></p>
                <p><label for="username">Username: </label>
                <input type="text" name="username" id="username" ></p>
                <p><label for="password">Password: </label>
                <input type="password" name="password" id="password"></p>
                <input type="submit" id="btn_inregistrare"  value="Register"/>
            </fieldset>
</div>
    <div id="rezultat"></div>
</div> <!--content-->
</body>
</html>