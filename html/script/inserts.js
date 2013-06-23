
$("#sub").click(function(){

    $.post($("#register-form").attr("action"), $("#register-form :input").serializeArray(), function(info) { $("#rezultat").empty();$("#rezultat").html(info)});

});

$("#register-form").submit(function (){
    return false;
});
