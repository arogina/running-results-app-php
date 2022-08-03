function isValidChars (name) {
    let regex = /^[^0-9 ][a-zÀ-ž]+$/iu;

    return regex.test(name);
}

function isValidUsername (username) {
    let regex = /^[^0-9 ][a-z0-9]+$/i;

    return regex.test(username);
}

function isValidEmail (email) {
    let regex = /\S+\@\S+\.\S+/;

    return regex.test(email);
}

function isValidPasswordChars (password) {
    let regex = /(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!*?#$.])/;

    return regex.test(password);
}

function isValidPasswordLength (password) {
    return password.length >= 8;
}

function isPasswordConfirmed (password, confirmPassword) {
    return password === confirmPassword;
}

$(document).ready(function() {
    $("#username").focusout(function() {
        $.ajax({
            url: "../api/registracija.api.php",
            method: "GET",
            data: { "username": $("#username").val() },
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    if ($(json)[0]["usernameExist"]) {
                        $("#error-username").append("Korisničko ime već postoji!");
                        $(':input[type="submit"]').prop('disabled', true);
                    } else {
                        $("#error-username").empty();
                        $("#submit").prop('disabled', false);
                    };
                }
            }
        });
    });

    $("#register-form").submit(function(e) {
        let isSuccess = true;
        let isEmpty = false;
        let validChars = true;
        let validUsername = true;
        let validEmail = true;
        let validPasswordChars = true;
        let validPasswordLength = true;
        let validConfirmPassword = true;

        $(this).children('.main__form-element').each(function() {
            $(this).find('.main__form-error').empty();
            if($(this).find('.form__input').val() == "") {
                $(this).find('.main__form-error').append("Polje ne smije biti prazno!");
                isEmpty = true;
            }
        });

        if (!isEmpty) {
            if (!isValidChars($("#name").val()) || !isValidChars($("#surname").val())) {
                validChars = false;
                if (!isValidChars($("#name").val())) {
                    $("#error-name").append("Ime ne može sadržavati brojeve (0-9)<br> ili razmak!");
                }
                if (!isValidChars($("#surname").val())) {
                    $("#error-surname").append("Prezime ne može sadržavati brojeve (0-9)<br> ili razmak!");
                }
            }

            if (!isValidUsername($("#username").val())) {
                validUsername = false;
                $("#error-username").append("Korisničko ime ne može započeti s <br> brojevima (0-9) ili razmakom!");
            }

            if (!isValidEmail($("#email").val())) { 
                validEmail = false;
                $("#error-email").append("Nevažeći email!");
            }

            if (!isValidPasswordLength($("#password").val())) {
                validPasswordLength = false;
                $("#error-password").append("Lozinka mora sadržavati najmanje 8 znakova!");
            }

            if (validPasswordLength) {
                if (!isValidPasswordChars($("#password").val())) {
                    validPasswordChars = false;
                    $("#error-password").append("Lozinka mora sadržavati velika i mala slova,<br> brojeve te specijalne znakove (!*?#$.)");
                }
            }

            if (validPasswordChars && validPasswordLength) {
                if (!isPasswordConfirmed($("#password").val(), $("#confirm-password").val())) {
                    validConfirmPassword = false;
                    $("#error-confpassword").append("Lozinke moraju biti iste!");
                }
            }
        }

        isSuccess = isEmpty || !validChars || !validUsername || !validEmail || !validPasswordChars || !validPasswordLength || !validConfirmPassword;
        
        if (isSuccess) {
            e.preventDefault();
        }
    });
});