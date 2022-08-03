<?php
    function check_if_empty($user_data) {
        foreach ($user_data as $key => $value) {
            if ($key != "g-recaptcha-response" && empty($value)) return true;
        }
        
        return false;
    }

    function check_invalid_chars($name) {
        $regex = "/^[^0-9 ][\p{L}-]+$/iu";

        return preg_match($regex, $name);
    }

    function check_username($username) {
        $regex = "/^[^0-9 ][a-z0-9]+$/i";

        return preg_match($regex, $username);
    }

    function check_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function check_password_chars($password) {
        $regex = "/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!*?#$.])/";

        return preg_match($regex, $password);
    }

    function check_password_length($password) {
        return strlen($password) >= 8;
    }

    function check_confirm_password($password, $confirm_password) {
        return $password === $confirm_password;
    }

    function check_recaptcha($recaptcha) {
        $secret_key = "6LctmFcgAAAAAPWvu3Zd8TK_CpniE4Fl_qf_6Hem";
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha";

        $response = file_get_contents($url);
        $json = json_decode($response);

        return $json->success;
    }

    function generate_salt() {
        return bin2hex(random_bytes(5));
    }

    if (isset($_POST['submit'])) {
        if (check_if_empty($_POST)) {
            header("location: ../obrasci/registracija.php?error=emptyvalues");
            exit();
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm-password"];
        $terms = isset($_POST["terms"]) ? 1 : 0;
        $recaptcha = $_POST["g-recaptcha-response"];

        if (!check_invalid_chars($name)) {
            header("location: ../obrasci/registracija.php?error=invalidname");
            exit();
        }

        if (!check_invalid_chars($surname)) {
            header("location: ../obrasci/registracija.php?error=invalidsurname");
            exit();
        }

        if (!check_username($username)) {
            header("location: ../obrasci/registracija.php?error=invalidusername");
            exit();
        }

        if (!check_email($email)) {
            header("location: ../obrasci/registracija.php?error=invalidemail");
            exit();
        }

        if (!check_password_chars($password)) {
            header("location: ../obrasci/registracija.php?error=passwordchars");
            exit();
        }

        if (!check_password_length($password)) {
            header("location: ../obrasci/registracija.php?error=passwordlength");
            exit();
        }

        if (!check_confirm_password($password, $confirm_password)) {
            header("location: ../obrasci/registracija.php?error=confirmpassword");
            exit();
        }

        if (!check_recaptcha($recaptcha)) {
            header("location: ../obrasci/registracija.php?error=recaptchafalse");
            exit();
        }

        $salt = generate_salt();
        $sha256_password = hash("sha256", $salt.$password);

        $user = new User();

        if ($user->insert_user($name, $surname, $username, $email, $password, $sha256_password, $salt, $terms)) {
            header("location: ../obrasci/registracija.php?success=true");
            exit();
        } else {
            header("location: ../obrasci/registracija.php?success=false");
            exit();
        }
    }