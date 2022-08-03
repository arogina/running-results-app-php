<?php
    if (!strpos($_SERVER['REQUEST_URI'], 'index.php') === true) {
        header("location: ./index.php");
        exit();
    }  

    $directory = getcwd();
    $path = dirname($_SERVER['REQUEST_URI']);

    require_once "$directory/zaglavlje.php";

    $title = "Trčanje - početna";
    $subtitle = "Početna";

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("index.tpl");
    $smarty->display("podnozje.tpl");