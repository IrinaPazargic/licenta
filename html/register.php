
<html>
<head>
<title>Registration Page</title>
<link href="register.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<div id="content">
<ul>
    <li><a id="logon" href="register.php">Log on</a></li>
    <li><a id="login" href="login.php">Log in</a></li>

</ul>
<div style="clear:both;" id="form">
    <form action="inregistrare.php" id="register-form" method="post" >
            <fieldset>
                <legend>Pagina de inregistrare</legend>
                <p><label for="nume">Nume: </label>
                <input type="text" name="nume" required=""></p>
                <p><label for="prenume">Prenume: </label>
                <input type="text" name="prenume" required=""></p>
                <p><label for="email">E-mail: </label>
                <input type="text" name="email" required=""></p>
                <p><label for="tel">Telefon: </label>
                <input type="text" name="tel" required=""></p>
                <p><label for="adresa">Adresa: </label>
                <input type="text" name="adresa" required=""></p>
                <p><label for="username">Username: </label>
                <input type="text" name="username" required=""></p>
                <p><label for="password">Password: </label>
                <input type="password" name="password" required=""></p>
                <input type="submit" id="button" value="Register"/>
            </fieldset>
    </form>
</div>
</div> <!--content-->
</body>
</html>