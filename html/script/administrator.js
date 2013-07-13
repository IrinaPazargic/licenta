$(function (){
    $("#btn_inregistrare").click(function () {

        var nume = $('#nume').val();
        var prenume = $('#prenume').val();
        var email = $('#email').val();
        var telefon = $('#telefon').val();
        var adresa= $('#adresa').val();
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax(
            {
                type: "POST",
                url: "inregistrare_admin.php",
                dataType: "html",
                data: "nume=" + nume + "&prenume=" + prenume + "&email=" + email + "&telefon=" + telefon + "&adresa=" + adresa +"&username=" + username + "&password=" + password,
                success: function (result) {
                    console.log(result);
                    alert(result);
                },
                error: function () {
                    alert("Inregistrarea a esuat!");
                }
            });
    });


  /*  $("#btn_logare").click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        console.log(username);
        $.ajax(
            {
                type: "POST",
                url: "check_login.php",
                dataType: "html",
                data: "username=" + username + "&password=" + password,
                success: function (result) {
                    console.log(result);
                    alert(result);
                },
                error: function () {
                    alert("Logare nereusita. Va rugam incercati mai tarziu!");
                }
            });

    });*/

});
