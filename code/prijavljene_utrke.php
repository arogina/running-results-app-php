<?php
    $directory = getcwd();
    $path = dirname($_SERVER['REQUEST_URI']);

    require_once "$directory/zaglavlje.php";

    if (!isset($_SESSION["user_id"])) {
        header("location: $path/index.php");
        exit();
    }

    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/utrka.class.php";

    $title = "Trčanje - Prijavljene utrke";
    $subtitle = "Prijavljene utrke";

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("prijavljene_utrke.tpl");
    $smarty->display("podnozje.tpl");