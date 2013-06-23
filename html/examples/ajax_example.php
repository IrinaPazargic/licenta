<html>
    <head>
        <link href="../reservation.css" rel="stylesheet" type="text/css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#next").click(function (event) {
                    event.preventDefault();
                    var values = "call=update";
                    $.ajax({
                        url: "test.php",
                        type: "get",
                        data: values,
                        success: function (result) {
                            console.log("Success");
                            $("#result").html(result);
                        },
                        error: function (error) {
                            console.error("Failure");
                            $("#result").html('there is error while submit');
                        }
                    });
                });
            })
        </script>
    </head>
    <body>
        <div id="content">
            <form>
                <input type="submit" id="next" value="Next"/>
            </form>
        </div>
        <div id="result"></div>
    </body>
</html>
