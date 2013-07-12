$(function () {

    $('#upload').submit('submit', function (e) {
        e.preventDefault();
        console.log(e);
        var files = e.target.fileselect.files;
        if (files.length > 1) {
            alert("Only one file can be uploaded.");
            return;
        }
        var file = files[0];
        console.log(file);
        uploadFile(file);
    });

    function uploadFile(file) {
        var titlu = $('#titlu').val();
        var idGen = $('#gen :selected').prop('value');
        var an = $('#an').val();
        var durata = $('#durata').val();
        var descriere = $('#descriere').val();
        var regia = $('#regia').val();
        var fileselect = $('#fileselect').val();
        var rol = $('#rol').val();
        console.log(imagine);

        var xhr = new XMLHttpRequest();
        if (xhr.upload && file.type == "image/jpeg") {
            console.log("Uploading file " + file.name + "through js");
            // start upload
            var action = $("#upload").prop('action');
           xhr.addEventListener("load", function () {
                alert("Inregistrare cu succes!");
            }, false);
            xhr.addEventListener("error",function () {
                alert("An error occurred while transferring the file.");
            }, false);
            xhr.open("POST", action, true);
            xhr.setRequestHeader("X_FILENAME", file.name);

            var data = new FormData();
            data.append('titlu', titlu);
            data.append('idGen', idGen);
            data.append('an', an);
            data.append('durata', durata);
            data.append('descriere', descriere);
            data.append('regia', regia);
            data.append('imagine', fileselect);
            data.append('rol', rol);
            data.append('aFile', file);
            xhr.send(data);
            console.log("Upload command has been sent to the server.");
        }
    }
});


