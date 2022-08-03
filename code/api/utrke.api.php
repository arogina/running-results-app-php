<?php
    require_once "../klase/db.class.php";
    require_once "../klase/utrka.class.php";
    require_once "../klase/sesija.class.php";

    Session::create_session();

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $num_of_results = 5;

    $race = new Race();
    $races = array();

    $num_of_pages = ceil($race->get_num_of_races() / $num_of_results);

    if ($page > $num_of_pages || $page < 1) {
        $json = json_encode(array("invalidParameters" => true));
        header("Content-Type: application/json");
        echo $json;
    } else {
        $data = "";
        if (isset($_SESSION["user_id"]) && $_SESSION["role"] == 3) {
            $data = $race->select_all_races_formatted($page, $num_of_results);
        } else {
            $data = $race->select_all_races_formatted($page, $num_of_results, false, $_SESSION["user_id"]);
        }

        while ($row = $data->fetch_object()) {
            if ($row) {
                array_push($races, [
                    "race_id" => $row->utrka_id,
                    "race" => $row->naziv,
                    "due_date" => date("d.m.Y", strtotime($row->rok_prijave)),
                    "closed" => $row->zavrsena == 1 ? "Završena" : "Nije završena",
                    "race_type" => $row->tip_utrke,
                    "country" => $row->drzava,
                    "canUpdate" => $_SESSION["role"] > 2 ? true : false
                ]);
            }
        }

        $json = json_encode($races);

        header("Content-Type: application/json");
        echo $json;
    }