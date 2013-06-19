$("#sub").click(function(){
    var data = $("#form :input").serializeArray();
    $.post($("#form").attr("action"), data, function(info) { $("#rezultat").html(info)});
});

