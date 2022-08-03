<?php
    require_once "../klase/db.class.php";
    require_once "../klase/korisnik.class.php";
    require_once "../klase/sesija.class.php";
    require_once "../klase/kolacici.class.php";

    function check_empty_values($username, $password) {
        return empty($username) || empty($password);
    }

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $remember_me = isset($_POST["remember-me"]) ? 1 : 0;

        if (check_empty_values($username, $password)) {
            header("location: ../obrasci/prijava.php?error=emptyvalues");
            exit();
        }

        $user = new User();

        if ($data = $user->check_user($username, $password)) {
            $sha256_password = $data["sha256_password"];
            $salt = $data["salt"];

            if (hash('sha256', $salt.$password) === $sha256_password) {
                if ($data["blocked"]) {
                    header("location: ../obrasci/prijava.php?user=blocked");
                    exit();
                } else {
                    Session::save_user($data["id"], $username, $data["role"]);
                    if ($remember_me == 1) {
                        Cookie::save_cookie("remember_me", $username, time() + (86400 * 30));
                    } else {
                        Cookie::delete_cookie("remember_me");
                    }

                    header("location: ../index.php");
                    exit();
                }
            }
        }
    }

    if (isset($_GET["blocked"])) {
        $username = $_GET["blocked"];

        $user = new User();
        $user_id = $user->check_username($username)["id"];

        if ($user->block_user($user_id)) {
            header("location: ../index.php");
            exit();
        }
    }