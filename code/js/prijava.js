$(document).ready(function() {
    var numOfAttempts = 0;

    $("#login-form").submit(function(e) {
        let isEmpty = false;
        let userExist = false;
        let correctPassword = false;

        $(this).children('.main__form-element').each(function() {
            $(this).find('.main__form-error').empty();
            if ($(this).find('.form__input').val() == "") {
                $(this).find('.main__form-error').empty();
                $(this).find('.main__form-error').append("Polje ne smije biti prazno!");
                isEmpty = true;
            }
        });

        $.ajax({
            url: "../api/prijava.api.php",
            method: "GET",
            async: false,
            data: { "username": $("#username").val(), "password": $("#password").val() },
            success: function(json) {
                if (!$(json)[0]["invalidParameter"]) {
                    if ($(json)[0]["userExist"]) {
                        userExist = true;
                        if (!$(json)[0]["correctPassword"]) {
                            numOfAttempts++;
                            if (numOfAttempts >= 3) {
                                alert("Krivi unos lozinke 3 puta! Korisnički račun je blokiran!");
                                window.location.replace("../obrasci/prijava.php?blocked=" + $("#username").val());
                            }
                            alert("Pogrešna lozinka! Preostali broj pokušaja: " + (3 - numOfAttempts));
                        } else {
                            correctPassword = true;
                        }
                    } else {
                        alert("Korisnik ne postoji!")
                    }
                }
            }
        });

        if (isEmpty || !userExist || !correctPassword) {
            e.preventDefault();
        }
    });
});