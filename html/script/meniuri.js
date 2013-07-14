$(function () {
    var aNoutati = $("a[id='noutati']");
    var aDespreNoi = $("a[id='despre_noi']");
    var aPolitici = $("a[id='politici']");
    var aContact = $("a[id='detalii_contact']");
    var aPreturi = $("a[id='preturi']");

    var buttonsArray = [aNoutati, aDespreNoi, aPolitici, aContact, aPreturi];


    $("#searchBody").show();
    $("#thirdNav").show();

    $("#program").click(function () {
        aNoutati.css("backgroundColor", "#B0B0B0");
        aPolitici.css("backgroundColor", "#B0B0B0");
        aDespreNoi.css("backgroundColor", "#B0B0B0");
        aContact.css("backgroundColor", "#B0B0B0");
        aPreturi.css("backgroundColor", "#B0B0B0");

        $("#searchBody").show();
        $("#thirdNav").show();
        $.ajax({
            type: "GET",
            url: "mainprogram.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

    $("#filme").click(function () {

        $("#searchBody").show();
        $("#thirdNav").show();
        $.ajax({
            type: "GET",
            url: "filme.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });
    $("#promotii").click(function () {
        aNoutati.css("backgroundColor", "#B0B0B0");
        aPolitici.css("backgroundColor", "#B0B0B0");
        aDespreNoi.css("backgroundColor", "#B0B0B0");
        aContact.css("backgroundColor", "#B0B0B0");
        aPreturi.css("backgroundColor", "#B0B0B0");

        $("#searchBody").hide();
        $("#thirdNav").hide();
        $.ajax({
            type: "GET",
            url: "promotii.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

    $("#map").click(function () {
        aNoutati.css("backgroundColor", "#B0B0B0");
        aPolitici.css("backgroundColor", "#B0B0B0");
        aDespreNoi.css("backgroundColor", "#B0B0B0");
        aContact.css("backgroundColor", "#B0B0B0");
        aPreturi.css("backgroundColor", "#B0B0B0");

        $("#searchBody").hide();
        $("#thirdNav").hide();
        $.ajax({
            type: "GET",
            url: "map.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

    aNoutati.click(function () {
        highlightCurrentElement(buttonsArray, aNoutati);

        $("#searchBody").hide();
        $("#thirdNav").hide();
        $.ajax({
            type: "GET",
            url: "noutati.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

    aDespreNoi.click(function () {
        highlightCurrentElement(buttonsArray, aDespreNoi);
        $("#searchBody").hide();
        $("#thirdNav").hide();
        $.ajax({
            type: "GET",
            url: "despre_noi.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });
    aPolitici.click(function () {
        highlightCurrentElement(buttonsArray, aPolitici);
        $("#searchBody").hide();
        $("#thirdNav").hide();
        $.ajax({
            type: "GET",
            url: "politici.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

    aPreturi.click(function () {
        highlightCurrentElement(buttonsArray, aPreturi);
        $("#searchBody").hide();
        $("#thirdNav").hide();
        $.ajax({
            type: "GET",
            url: "preturi.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });

    });

    aContact.click(function () {
        highlightCurrentElement(buttonsArray, aContact);
        $.ajax({
            type: "GET",
            url: "contact.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

/*
    $("#btn_cauta").click(function () {
        var cinema = $('#cinema :selected').text();
        var gen = $('#gen :selected').text();
        var film = $("#titlu").val();
        var data = $('#data :selected').text();
        console.log(cinema + idGen + titlu + data);
        $.ajax({
            type: "GET",
            url: "program.php?cinema=" + cinema + "&gen=" + gen + "&film=" + film + "&data=" + data,
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });*/

    $(".filmsLink").click(function () {
        var idGen = $(this).attr('id');
        console.log(idGen);
        $.ajax({
            type: "GET",
            url: "filme.php?idGen=" + idGen,
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

    $("#program_cinema").click(function () {
        var idCinema = $(this).attr('idCinema');
        console.log(idCinema);
        $.ajax({
            type: "GET",
            url: "program.php?idCinema=" + idCinema,
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });



});
