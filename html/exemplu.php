<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
<script src="inserts.js"></script>
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
<style>.signup
    { border: 1px solid #999999;
     font: normal 14px helvetica;
     color:#444444; }
</style>
</head>
<body>
<table class="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
    <th colspan="2" align="center">Signup Form</th>
    <form id="form" method="post" action="inregistrare.php"
          onSubmit="return validate(this)">
        <tr><td>Nume</td><td><input type="text" maxlength="32"
                                        name="nume" required=""/></td>
        </tr><tr><td>Prenume</td><td><input type="text" maxlength="32"
                                            name="prenume" required=""/></td>
        </tr><tr><td>Adresa</td><td><input type="text" maxlength="16"
                                             name="adresa" required="" /></td>
        </tr><tr><td>Username</td><td><input type="text" maxlength="16"
                                             name="username" required=""/></td>
        </tr><tr><td>Password</td><td><input type="password" maxlength="12"
                                             name="password" required=""/></td>
        </tr><tr><td>Telefon</td><td><input type="text" maxlength="10"
                                        name="telefon" required=""/></td>
        </tr><tr><td>Email</td><td><input type="text" maxlength="64"
                                          name="email" required=""/></td>
        </tr><tr><td colspan="2" align="center">
                <input type="submit" id="sub" value="Signup" /></td>
        </tr></form>
</table>
<div id="rezultat">
 </div>
</body>
</html>