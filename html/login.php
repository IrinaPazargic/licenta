<?php
?>

<html>
<head>
<link href="register.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="content">
    <ul>
        <li><a id="logon" href="register.php">Log on</a></li>
        <li><a id="login" href="login.php">Log in</a></li>

    </ul>
    <div style="clear:both;" id="form">
        <form action="administrator.php" method="post">
            <fieldset>
                <legend>Pagina de logare</legend>
                <p><label for="username">Username: </label>
                    <input type="text" id="username"></p>
                <p><label for="password">Password: </label>
                    <input type="password" id="password"></p>
                <input type="submit" id="button" value="Log In"/>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>