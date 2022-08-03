<?php
    require_once "../klase/db.class.php";
    require_once "../klase/korisnik.class.php";

    if (isset($_GET["username"]) && isset($_GET["password"])) {
        $username = $_GET["username"];
        $password = $_GET["password"];

        $userExist = false;
        $correctPassword = false;

        $user = new User();
        $data = $user->check_username($username);

        if ($data != false) {
            $userExist = true;

            $sha256_password = $data["sha256_password"];
            $salt = $data["salt"];

            if (hash('sha256', $salt.$password) === $sha256_password) {
                $correctPassword = true;
            } 
        }

        $response = array("userExist" => $userExist, "correctPassword" => $correctPassword);

        $json = json_encode($response);
        header("Content-Type: application/json");
        echo $json;
    } else {
        $response = array("invalidParameters" => true);

        $json = json_encode($response);
        header("Content-Type: application/json");
        echo $json;
    }