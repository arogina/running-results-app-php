<?php 
    if (isset($_POST["submit"])) {
        $user_id = $_POST["users"];

        $country = new Country();

        if ($country->check_moderator($user_id, $_COOKIE["countryid"])) {
            header("location: ../obrasci/dodaj_moderatora.php?error=alreadymod");
            exit();
        }

        if ($country->define_moderator($_COOKIE["countryid"], $user_id)) {
            header("location: ../obrasci/dodaj_moderatora.php?user=mod");
            Cookie::delete_cookie("countryid");
            exit();
        }
    }