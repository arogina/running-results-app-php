<?php 
    $directory = dirname(getcwd());
    $path = dirname($_SERVER['REQUEST_URI'], 2);

    require_once "$directory/zaglavlje.php";

    if (!isset($_SESSION["user_id"])) {
        header("location: $path/index.php");
        exit();
    }

    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/utrka.class.php";
    require_once "$directory/klase/kolacici.class.php";
    require_once "$directory/skripte/prijava_utrke.validacija.php";

    $title = "Trčanje - Prijava utrke";
    $subtitle = "Prijava utrke";

    $race = new Race();
    $data = $race->select_all_races();
    $races = array();

    while ($row = $data->fetch_object()) {
        if ($row) {
            if ($row->zavrsena == 0) {
                array_push($races, [
                    "id" => $row->utrka_id,
                    "name" => $row->naziv
                ]);
            }
        }
    }
    
    $birth_date = "";
    if (isset($_GET["raceid"])) {
        $race_id = $_GET["raceid"];
        $birth_date = $race->get_signed_race($_SESSION["user_id"], $race_id);
        Cookie::save_cookie("raceid", $_GET["raceid"], time()+60*5);
    }

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);
    $smarty->assign("races", $races);
    $smarty->assign("birth_date", $birth_date);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("prijava_utrke.tpl");
    $smarty->display("podnozje.tpl");