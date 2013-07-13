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
        var queryString = "?titlu=" + titlu;
        $.ajax(
            {
                type: "GET",
                url: "cauta_film_functii.php" + queryString,
                dataType: "html",
                success: function (result) {
                    $("#rezultat").html(result);
                    $('#titlu').val('');
                },
                error: function () {
                    alert("Cautarea a esuat.");
                }
            });
    });

    $("#btn_sterge").click(function () {
        var titlu = $('#titlu').val();
        $.ajax(
            {
                type: "POST",
                url: "sterge_film.php",
                dataType: "html",
                data: "titlu=" + titlu,
                success: function (result) {
                    alert(result);
                    $('#titlu').val('');
                },
                error: function () {
                    alert("Stergerea a esuat.");
                }
            });

    });

    $("#detalii").click(function cautaProgram() {
        $('#right').load("detalii_cont.php");
    });
});
