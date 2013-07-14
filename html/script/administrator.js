$(function (){

    $("#register-form").validate({
               rules: {
                   nume: {
                       required: true,
                       minlength: 3
                   },
                   prenume: "required",
                   telefon: {
                       required: true,
                       number: true,
                       minlength: 10,
                       maxlength: 15
                   },
                   adresa: "required",
                   email: {
                       required: true,
                       email: true
                   },
                   username: "required"
               },
               messages: {
                   nume: "Enter your first name, min 3 caractere",
                   prenume: "Enter your last name",
                   telefon: "Enter your phone",
                   adresa: "Introduceti adresa",
                   username: "Introduceti numele de utilizator",
                   email: {
                       required: "Introduceti adresa de email",
                       email: "Va rugam sa introduceti o adresa de email valida."
                   }
               }
           });
           $("#register-form").submit(function (e) {
               var valid = $("#register-form").valid();
               console.log("Is form valid? " + valid);
               if (valid) {
                   inregistreazaAdministrator();
               }
               return false;
           });

           function inregistreazaAdministrator() {
               var nume = $('#nume').val();
               var prenume = $('#prenume').val();
               var email = $('#email').val();
               var telefon = $('#telefon').val();
               var adresa = $('#adresa').val();
               var username = $('#username').val();
               var password = $('#password').val();
               $.ajax(
                   {
                       type: "POST",
                       url: "inregistrare_admin.php",
                       dataType: "html",
                       data: "nume=" + nume + "&prenume=" + prenume + "&email=" + email + "&telefon=" + telefon + "&adresa=" + adresa + "&username=" + username + "&password=" + password,
                       success: function (result) {
                           alert(result);
                       },
                       error: function () {
                           alert("Inregistrarea a esuat!");
                       }
                   });
           }
});
