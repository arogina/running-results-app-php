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
    require_once "$directory/skripte/dodaj_drzavu.validacija.php";

    $title = "Trčanje - Dodaj državu";
    $subtitle = "Dodaj državu";

    $country = new Country();

    $country_data = "";
    if (isset($_GET["countryid"])) {
        $country_id = $_GET["countryid"];
        $country_data = $country->select_country($country_id);
        Cookie::save_cookie("countryid", $country_id, time()+60*5);
    }

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);
    $smarty->assign("country", $country_data);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("dodaj_drzavu.tpl");
    $smarty->display("podnozje.tpl");