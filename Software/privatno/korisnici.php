<?php 
    $directory = dirname(getcwd());
    $path = dirname($_SERVER['REQUEST_URI'], 2);

    require_once "$directory/zaglavlje.php";
    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/korisnik.class.php";

    $title = "Trčanje - Korisnici";
    $subtitle = "Korisnici";

    $user = new User();
    $users = array();

    $data = $user->select_all_users();

    while ($row = $data->fetch_object()) {
        if ($row) {
            array_push($users, [
                "username" => $row->korisnicko_ime,
                "name" => $row->ime,
                "surname" => $row->prezime,
                "email" => $row->email,
                "password" => $row->lozinka
            ]);
        }
    }

    $smarty->assign("path", $path);
    $smarty->assign("directory", $directory);
    $smarty->assign("title", $title);
    $smarty->assign("subtitle", $subtitle);
    $smarty->assign("users", $users);

    $smarty->display("zaglavlje.tpl");
    $smarty->display("korisnici.tpl");
    $smarty->display("podnozje.tpl");