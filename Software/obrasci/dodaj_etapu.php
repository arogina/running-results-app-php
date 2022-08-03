<?php
    $directory = dirname(getcwd());
    $path = dirname($_SERVER['REQUEST_URI'], 2);

    require_once "$directory/zaglavlje.php";
    
    if (!isset($_SESSION["user_id"]) || (isset($_SESSION["user_id"]) && $_SESSION["role"] < 2)) {
        header("location: $path/index.php");
        exit();
    }
    
    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/etapa.class.php";
    require_once "$directory/klase/utrka.class.php";
    require_once "$directory/klase/kolacici.class.php";
    require_once "$directory/skripte/dodaj_etapu.validacija.php";

    $title = "Trčanje - Dodaj etapu";
    $subtitle = "Dodaj etapu";

    $races = array();

    $stage = new Stage();
    $race = new Race();
    $races_data = "";

    if ($_SESSION["role"] == 2) {
        $races_data = $race->select_all_active_races($_SESSION["user_id"]);
    } else  $races_data = $race->select_all_active_races();
    
    while ($row = $races_data->fetch_object()) {
        if ($row) {
            array_push($races, [
                "id" => $row->utrka_id,
                "name" => $row->naziv,
            ]); 
        }
    }

    $stage_data = "";
    if (isset($_GET["stageid"])) {
        $stage_id = $_GET["stageid"];
        $stage_data = $stage->select_stage($stage_id);
        Cookie::save_cookie("stageid", $stage_id, time()+60*5);
    }

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);
    $smarty->assign("races", $races);
    $smarty->assign("stage", $stage_data);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("dodaj_etapu.tpl");
    $smarty->display("podnozje.tpl");