function validateNume(field) {
    if (field == "") return "Introduceti Numele.\n"
    return ""
    }

function validatePrenume(field) {
    if (field == "") return "Introduceti Prenumele.\n"
    return ""
    }

function validateAdresa(field) {
    if (field == "") return "Introduceti adresa.\n"
    return ""
    }

function validateUsername(field) {
    if (field == "") return "Introduceti un Username.\n"
    else if (field.length < 5)
    return "Username-ul trebuie sa contina minim 5 caractere.\n"
    else if (/[^a-zA-Z0-9_-]/.test(field))
    return "Doar a-z, A-Z, 0-9, - si _ valabile in Usernames.\n"
    return ""
    }

function validatePassword(field) {
    if (field == "") return "Introduceti parola.\n"
    else if (field.length < 6)
    return "Password-ul trebuie sa contina minim 6 caractere.\n"
    else if (!/[a-z]/.test(field) && ! /[A-Z]/.test(field) &&
    !/[0-9]/.test(field))
    return "Passwords accepta doar caractere a-z, A-Z si 0-9.\n"
    return ""
    }

function validateTelefon(field) {
    if (isNaN(field)) return "introduceti nr-ul de telefon.\n"
 //   else if (field < 10 || field > 10)
 //   return "Nr  trebuie sa contina 10 cifre.\n"
    return ""
    }

function validateEmail(field) {
    if (field == "") return "Introduceti adresa de Email.\n"
    else if (!((field.indexOf(".") > 0) &&
    (field.indexOf("@") > 0)) ||
    /[^a-zA-Z0-9.@_-]/.test(field))
    return "Adresa de Email este invalida.\n"
    return ""
    }