$("#sub").click(function () {
    var $register = $("#register-form");
    $.post(
        $register.attr("action"),
        $register.find(":input").serializeArray(),
        function (info) {
            var $rezultat = $("#rezultat");
            $rezultat.empty();
            $rezultat.html(info);
        }
    );
});

$("#register-form").submit(function () {
    return false;
});
