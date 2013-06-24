<?php
require_once 'model.php';
require_once 'config.php';
?>

<html>
<head>
    <link href="register.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
    <div id="content">
        <ul>
            <li><a id="logon" href="register.php">Log on</a></li>
            <li><a id="login" class="current" href="login.php">Log in</a></li>
        </ul>
        <div style="clear:both;" id="form">
            <form action="check_login.php" method="post" id="myform" enctype="multipart/form-data">
                <fieldset>
                    <legend>Pagina de logare</legend>
                    <p>
                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username">
                    </p>
                    <p>
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password">
                    </p>
                    <input type="submit" id="sub" value="Log In"/>
                </fieldset>
            </form>
        </div>
        <div id="raspuns"></div>
    </div>
</body>
</html>