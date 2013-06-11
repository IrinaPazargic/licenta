<?php
    require_once 'model.php';
    require_once 'config.php';


    $username=$_POST['username'];
    $password=sha1($_POST['password']);

    $query = "select * from users where username= '$username' AND password = '$password'";
    $result = mysql_query($query);

    if($result == 1) {
        $_SESSION['username'] = $username;
    } else {
        echo "invalid username or password!!";
    }

?>

<html>
<head>
<link href="register.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#button").click(function () {
                var username=$("#username").val();
                $.ajax({
                    type: "POST",
                    url: "administrator.php",
                    data: "username=" + username,
                    success: function(result) {
                        console.log('success: ' + result);
                        $("#content").html(result);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</head>
<body>
<div id="content">
    <ul>
        <li><a id="logon" href="register.php">Log on</a></li>
        <li><a id="login" href="login.php">Log in</a></li>

    </ul>
    <div style="clear:both;" id="form">
        <form action="#" method="post">
            <fieldset>
                <legend>Pagina de logare</legend>
                <p><label for="username">Username: </label>
                    <input type="text" name="username"></p>
                <p><label for="password">Password: </label>
                    <input type="password" name="password"></p>
                <input type="submit" id="button" value="Log In"/>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>