<?php 
    if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
        $address = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        header("location: $address");
        exit();
    }

    $directory = dirname(getcwd());
    $path = dirname($_SERVER['REQUEST_URI'], 2);

    require_once "$directory/zaglavlje.php";
    
    if (isset($_SESSION["user_id"])) {
        header("location: $path/index.php");
        exit();
    }

    require_once "$directory/skripte/prijava.validacija.php";

    $title = "Trčanje - Prijava";
    $subtitle = "Prijava";

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("prijava.tpl");
    $smarty->display("podnozje.tpl");