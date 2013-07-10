$(function () {
    $.ajax({
        type: "GET",
        url: "viz_rez.php",
        data: "",
        success: function (data) {
            $('#rezultat').html(data);
        }
    });

    $("#btn_cauta").click(function cautaProgram() {
        var email = $('#email').val();
        var queryString = "?email=" + email;
        $.ajax(
            {
                type: "GET",
                url: "viz_rez_functii.php" + queryString,
                dataType: "html",
                success: function (result) {
                    $("#rezultat").html(result);
                    $("#rezultat").show();
                    $('#email').val();
                },
                error: function () {
                    alert("Cautarea a esuat.");
                }
            });
    })


    $("#detalii").click(function cautaProgram() {
        $('#right').load("detalii_cont.php");
    });


});
