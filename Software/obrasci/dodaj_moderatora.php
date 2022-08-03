<?php 
    $directory = dirname(getcwd());
    $path = dirname($_SERVER['REQUEST_URI'], 2);

    require_once "$directory/zaglavlje.php";

    if (!isset($_SESSION["user_id"]) || (isset($_SESSION["user_id"]) && $_SESSION["role"] < 3)) {
        header("location: $path/index.php");
        exit();
    }

    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/drzava.class.php";
    require_once "$directory/klase/kolacici.class.php";
    require_once "$directory/klase/korisnik.class.php";
    require_once "$directory/skripte/dodaj_moderatora.validacija.php";

    $title = "Trčanje - Dodaj moderatora";
    $subtitle = "Dodaj moderatora";

    $country = new Country();
    $user = new User();

    $country_data = "";
    if (isset($_GET["countryid"])) {
        $country_id = $_GET["countryid"];
        Cookie::save_cookie("countryid", $country_id, time()+60*5);
    }

    if (isset($_COOKIE["countryid"])) {
        $country_data = $country->select_country($_COOKIE["countryid"]);
    }

    $users = array();
    $data = $user->select_all_users();
    while ($row = $data->fetch_object()) {
        if ($row) {
            if ($row->tip_korisnika_tip_korisnika_id == 2) {
                array_push($users, [
                    "id" => $row->korisnik_id,
                    "username" => $row->korisnicko_ime
                ]);
            }
        }
    }

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);
    $smarty->assign("country", $country_data);
    $smarty->assign("users", $users);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("dodaj_moderatora.tpl");
    $smarty->display("podnozje.tpl");