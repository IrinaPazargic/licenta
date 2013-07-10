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
            url: "viz_sali.php",
            data: "",
            success: function (data) {
                $('#div_vizualizare').html(data);
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
        var sala = $('#sala').val();
        var id_tip = $('#tip :selected').prop('value');
        console.log(tip + sala + id_tip);
        $.ajax(
            {
                type: "POST",
                url: "inregistrare_sala.php",
                dataType: "html",
                data: "sala=" + sala + "&id_tip=" + id_tip,
                success: function (result) {
                    console.log(result);
                    alert(result);
                    $('#sala').val('');
                },
                error: function () {
                    alert("Stergerea a esuat.");
                }
            });
    });

    $("#btn_sterge").click(function () {
        var sala = $('#sala').val();
        console.log(sala);
        $.ajax(
            {
                type: "POST",
                url: "sterge_sala.php",
                dataType: "html",
                data: "sala=" + sala,
                success: function (result) {
                    console.log(result);
                    alert(result);
                    $('#sala').val('');
                },
                error: function () {
                    alert("Stergerea a esuat.");
                }
            });
    });
});
