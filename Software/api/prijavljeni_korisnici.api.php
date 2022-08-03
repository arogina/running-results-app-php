<?php
    require_once "../klase/db.class.php";
    require_once "../klase/korisnik.class.php";

    $stage_id = $_COOKIE["stageid"];

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $num_of_results = 5;

    $user = new User();
    $competitors = array();

    $num_of_pages = ceil($user->select_num_of_signed_races($stage_id) / $num_of_results);

    if ($page > $num_of_pages || $page < 1) {
        $json = json_encode(array("invalidParameters" => true));
        header("Content-Type: application/json");
        echo $json;
    } else {
        $data = $user->select_signed_races($stage_id, $page, $num_of_results);
        while ($row = $data->fetch_object()) {
            if ($row) {
                array_push($competitors, [
                    "user_id" => $row->korisnik_id,
                    "username" => $row->korisnicko_ime,
                    "race" => $row->utrka,
                    "signed_date" => date("d.m.Y", strtotime($row->datum_prijave)),
                    "birth_date" => $row->godina_rodenja,
                    "picture" => $row->slika
                ]);
            }
        }

        $json = json_encode($competitors);

        header("Content-Type: application/json");
        echo $json;
    }