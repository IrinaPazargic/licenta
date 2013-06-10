<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irina
 * Date: 6/10/13
 * Time: 10:30 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<html>
<head>
<title>Registration Page</title>
<link href="register.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
    <script>

    </script>
</head>
<body>
<div class="content">
<ul>
    <li><a id="logon" href="register.php">Log on</a></li>
    <li><a id="login" href="login.php">Log in</a></li>

</ul>
<div style="clear:both;" class="form">
    <form action="inregistrare.php" method="post">
            <fieldset>
                <legend>Pagina de inregistrare</legend>
                <p><label for="nume">Nume: </label>
                <input type="text" name="nume"></p>
                <p><label for="prenume">Prenume: </label>
                <input type="text" name="prenume"></p>
                <p><label for="email">E-mail: </label>
                <input type="text" name="email"></p>
                <p><label for="tel">Telefon: </label>
                <input type="text" name="tel"></p>
                <p><label for="adresa">Adresa: </label>
                <input type="text" name="adresa"></p>
                <p><label for="username">Username: </label>
                <input type="text" name="username"></p>
                <p><label for="password">Password: </label>
                <input type="password" name="password"></p>
                <input type="submit" value="Send"/>
            </fieldset>
    </form>
</div>
</div> <!--content-->
</body>
</html>