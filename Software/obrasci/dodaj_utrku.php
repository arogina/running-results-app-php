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
    require_once "$directory/klase/utrka.class.php";
    require_once "$directory/klase/kolacici.class.php";
    require_once "$directory/skripte/dodaj_utrku.validacija.php";

    $title = "Trčanje - Dodaj utrku";
    $subtitle = "Dodaj utrku";

    $types = array();
    $countries = array();

    $race = new Race();
    $country = new Country();

    $type_data = $race->select_race_types();
    while ($row = $type_data->fetch_object()) {
        if ($row) {
            array_push($types, [
                "id" => $row->tip_utrke_id,
                "name" => $row->naziv
            ]);
        }
    }

    $countries_data = $country->select_all_countries();
    while ($row = $countries_data->fetch_object()) {
        if ($row) {
            array_push($countries, [
                "id" => $row->drzava_id,
                "label" => $row->oznaka 
            ]); 
        }
    }

    $race_data = "";
    if (isset($_GET["raceid"])) {
        $race_id = $_GET["raceid"];
        $race_data = $race->select_race($race_id);
        Cookie::save_cookie("raceid", $race_id, time()+60*5);
    }

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);
    $smarty->assign("types", $types);
    $smarty->assign("countries", $countries);
    $smarty->assign("race", $race_data);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("dodaj_utrku.tpl");
    $smarty->display("podnozje.tpl");