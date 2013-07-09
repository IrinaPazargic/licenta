$(function () {
    $("#searchBody").show();
    $("#thirdNav").show();

    $("#program").click(function () {
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
    $("#oferte").click(function () {
        $("#searchBody").hide();
        $("#thirdNav").hide();
        $.ajax({
            type: "GET",
            url: "oferte.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });
    $("#map").click(function () {
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

    $("#noutati").click(function () {
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

    $("#despre_noi").click(function () {
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
    $("#politici").click(function () {
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

    $("#preturi").click(function () {
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

    $("#detalii_contact").click(function () {
        $.ajax({
            type: "GET",
            url: "contact.php",
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });


    $("#btn_cauta").click(function () {
        var cinema = $('#cinema :selected').text();
        var idGen = $('#gen :selected').prop('value');
        var titlu = $("#titlu").val();
        var data = $('#data :selected').text();
        console.log(cinema + idGen + titlu + data);
        $.ajax({
            type: "GET",
            url: "program.php?cinema=" + cinema + "&idGen=" + idGen + "&titlu=" + titlu + "&data=" + data,
            data: "",
            success: function (data) {
                $('#news').html(data);
            }
        });
    });

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


});
/**
 * Created with IntelliJ IDEA.
 * User: irina
 * Date: 7/5/13
 * Time: 6:24 PM
 * To change this template use File | Settings | File Templates.
 */
