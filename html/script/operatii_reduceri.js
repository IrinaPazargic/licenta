$(function () {
    var divSterge = $("#div_sterge");
    var divInregistrare = $("#div_inregistrare");
    var divVizualizare = $("#div_vizualizare");
    var divContent = $("#div_content");
    var divHidden = $("#div_hidden");

    var aSterge = $("a[id='sterge']");
    var aVizualizare = $("a[id='vizualizare']");
    var aInregistrare = $("a[id='inregistrare']");

    var divsArray = [divInregistrare, divVizualizare, divSterge];
    var buttonsArray = [aInregistrare, aVizualizare, aSterge];

    divContent.append(divInregistrare);

    aVizualizare.click(function () {
        console.log("Vizualizare...");

        $.ajax({ //Make the Ajax Request
            type: "GET",
            url: "viz_reducere.php", //file name
            data: "",
            success: function (data) {
                divVizualizare.html(data);
            }
        });

        showHiddenElement(divsArray, divContent, divHidden, divVizualizare);
        highlightCurrentElement(buttonsArray, aVizualizare);
    });

    aInregistrare.click(function () {
        showHiddenElement(divsArray, divContent, divHidden, divInregistrare);
        highlightCurrentElement(buttonsArray, aInregistrare);
    });

    aSterge.click(function () {
        showHiddenElement(divsArray, divContent, divHidden, divSterge);
        highlightCurrentElement(buttonsArray, aSterge);
    });

    $("#detalii").click(function cautaProgram() {
        $('#right'). load("detalii_cont.php");
    });

    $("#btn_inregistrare").click(function () {
        var tip = $('#tip').val();
        var pret = $('#pret').val();
        console.log(tip);
        console.log(pret);
        $.ajax(
            {
                type: "POST",
                url: "inregistrare_reducere.php",
                dataType: "html",
                data: "tip=" + tip + "&pret=" +pret,
                success: function (result) {
                    console.log(result);
                    alert(result);
                    $('#tip').val('');
                    $('#pret').val('');
                },
                error: function () {
                    alert("Stergerea a esuat.");
                }
            });

    });


    $("#btn_sterge").click(function () {
        var tip = $('#tip :selected').prop('value');
        console.log(tip);
        $.ajax(
            {
                type: "POST",
                url: "stergere_reducere.php",
                dataType: "html",
                data: "tip=" + tip,
                success: function (result) {
                    console.log(result);
                    alert(result);
                },
                error: function () {
                    alert("Stergerea a esuat.");
                }
            });

    });

});

