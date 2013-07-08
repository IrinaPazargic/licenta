$(function () {
    var divSterge = $("#div_sterge");
    var divInregistrare = $("#div_inregistrare");
    var divCauta = $("#div_cauta");

    var divContent = $("#div_content");
    var divHidden = $("#div_hidden");

    var aCauta = $("a[id='cauta']");
    var aInregistrare = $("a[id='inregistrare']");
    var aSterge = $("a[id='sterge']");

    var divsArray = [divInregistrare, divCauta, divSterge];
    var buttonsArray = [aInregistrare, aSterge, aCauta];

    divContent.append(divInregistrare);

    aCauta.click(function () {
        showHiddenElement(divsArray, divContent, divHidden, divCauta);
        highlightCurrentElement(buttonsArray, aCauta);
    });

    aInregistrare.click(function () {
        showHiddenElement(divsArray, divContent, divHidden, divInregistrare);
        highlightCurrentElement(buttonsArray, aInregistrare);
    });

    aSterge.click(function () {
        showHiddenElement(divsArray, divContent, divHidden, divSterge);
        highlightCurrentElement(buttonsArray, aSterge);
    });

    $("#btn_cauta").click(function cautaProgram() {
        var titlu = $('#titlu').val();
        var data = $('#data').val();
        var ora = $('#ora').val();
        var queryString = "?titlu=" + titlu + "&data=" + data + "&ora=" + ora;
        $.ajax(
            {
                type: "GET",
                url: "cauta_program.php" + queryString,
                dataType: "html",
                success: function (result) {
                    $("#rezultat").html(result);
                    $("#rezultat").show();
                },
                error: function() {
                    alert("Cautarea a esuat.");
                }
            });
    });

    $("#btn_sterge").click(function () {
        $("#rezultat").hide();
        var titlu = $('#titlu').val();
        var data = $('#data').val();
        var ora = $('#ora').val();
        var cinema = $('#cinema').val();
        console.log(titlu);
        console.log(data);
        console.log(ora);
        console.log(cinema);
        $.ajax(
            {
                type: "POST",
                url: "sterge_program.php",
                dataType: "html",
                data: "titlu=" + titlu + "&data=" +data +"&ora=" +ora + "&cinema=" +cinema,
                success: function (result) {
                    console.log(result);
                    alert(result);
                },
                error: function () {
                    alert("Stergerea a esuat.");
                }
            });

    });


    $("#btn_inregistrare").click(function () {
        var titlu = $('#titlu').val();
        var cinema = $('#cinema :selected').prop('value');
        var data = $('#data :selected').prop('value');
        var ora = $('#ora').val();
        var idSala = $('#sala :selected').prop('value');
        console.log(titlu + cinema + data + ora + idSala);
        $.ajax(
            {
                type: "POST",
                url: "inserare_program.php",
                dataType: "html",
                data: "titlu=" + titlu + "&cinema=" + cinema + "&data=" + data +"&ora=" + ora + "&idSala=" + idSala,
                success: function (result) {
                    console.log(result);
                    alert(result);
                },
                error: function () {
                    alert("Inregistrarea a esuat!.");
                }
            });
    });




    $("#detalii").click(function cautaProgram() {
        $('#right'). load("detalii_cont.php");
    });
});
