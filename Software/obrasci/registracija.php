<?php 
    $directory = dirname(getcwd());
    $path = dirname($_SERVER['REQUEST_URI'], 2);

    require_once "$directory/zaglavlje.php";

    if (isset($_SESSION["user_id"])) {
        header("location: $path/index.php");
        exit();
    }

    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/korisnik.class.php";
    require_once "$directory/klase/kolacici.class.php";
    require_once "$directory/skripte/registracija.validacija.php";

    $title = "Trčanje - Registracija";
    $subtitle = "Registracija";


    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("registracija.tpl");
    $smarty->display("podnozje.tpl");