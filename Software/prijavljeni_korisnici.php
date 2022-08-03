<?php
    $directory = getcwd();
    $path = dirname($_SERVER['REQUEST_URI']);

    require_once "$directory/zaglavlje.php";

    if (!isset($_SESSION["user_id"]) || (isset($_SESSION["user_id"]) && $_SESSION["role"] < 2) || !isset($_GET["stageid"])) {
        header("location: $path/index.php");
        exit();
    }

    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/etapa.class.php";
    require_once "$directory/klase/kolacici.class.php";

    $stage = new Stage();

    $stage_data = "";
    if(isset($_GET["stageid"])) {
        $stage_id = $_GET["stageid"];
        $stage_data = $stage->select_stage($stage_id);
        Cookie::save_cookie("stageid", $stage_id, time()+60*5);
    }

    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/utrka.class.php";

    $title = "Trčanje - Natjecatelji";
    $subtitle = "Natjecatelji";

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);
    $smarty->assign("stage", $stage_data);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("prijavljeni_korisnici.tpl");
    $smarty->display("podnozje.tpl");