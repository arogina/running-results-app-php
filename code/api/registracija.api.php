<?php
    require_once "../klase/db.class.php";
    require_once "../klase/korisnik.class.php";

    if (isset($_GET["username"])) {
        $username = $_GET["username"];
        
        $user = new User();
        $exist = $user->check_username($username);

        $answer = array("usernameExist" => $exist);
        $json = json_encode($answer);

        header("Content-Type: application/json");
        echo $json;
    } else {
        $answer = array("invalidParameters" => true);
        $json = json_encode($answer);

        header("Content-Type: application/json");
        echo $json;
    }