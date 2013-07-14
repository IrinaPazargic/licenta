<html>
<head>
    <title>Registration Page</title>
    <link href="register.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="stylesheet.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="script/administrator.js" ></script>
</head>
<body>
<div id="content">
<ul>
    <li><a id="logon" class="current" href="register.php">Log on</a></li>
    <li><a id="login" href="login.php">Log in</a></li>

</ul>
    <div id="form">
    <form id="register-form" class="cmxform" action="inregistrare_admin.php" method="post"
        <fieldset>
            <legend>Pagina de inregistrare</legend>
            <table>
                <tr>
                    <td class="label"><label for="nume">Nume:</label></td>
                    <td class="field">
                        <input id="nume" name="nume" style="width: 300px" type="text" tabindex="9"
                               value=""/>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="prenume">Prenume:</label></td>
                    <td class="field">
                        <input id="prenume" name="prenume" style="width: 300px" type="text"
                               tabindex="9" value=""/>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="email">E-mail:</label></td>
                    <td class="field">
                        <input id="email" name="email" style="width: 300px" type="text"
                               tabindex="9" value=""/>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="telefon">Telefon:</label></td>
                    <td class="field">
                        <input id="telefon" name="telefon" style="width: 300px" type="text" class="required phone"
                               tabindex="9" value=""/>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="adresa">Adresa:</label></td>
                    <td class="field">
                        <input id="adresa" name="adresa" style="width: 400px" type="text" class="required"
                               tabindex="9" value=""/>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="username">Nume utilizator:</label></td>
                    <td class="field">
                        <input id="username" name="username" style="width: 150px" type="text" class="required"
                               tabindex="9" value=""/>
                    </td>
                </tr>

                <tr>
                    <td class="label"><label for="password">Parola:</label></td>
                    <td class="field">
                        <input id="password" class="required password" maxlength="40" name="password" size="20"
                               type="password" tabindex="12" value=""/>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="password1">Testeaza parola:</label></td>
                    <td class="field">
                        <input id="password1" class="required" equalTo="#password" maxlength="40" name="password1"
                               size="20"
                               type="password" tabindex="13" value=""/>
                        <div class="formError"></div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <div class="buttonSubmit">
                            <span></span>
                            <input class="formButton" type="submit" value="Register" id="btn_inregistrare" style="width: 140px"
                                   tabindex="14"/>
                        </div>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <div id="rezultat"></div>
</div> <!--content-->

</body>
</html>