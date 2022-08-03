<?php
    require_once "../klase/db.class.php";
    require_once "../klase/utrka.class.php";

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $num_of_results = 5;

    $race = new Race();
    $upcoming = array();

    $num_of_pages = ceil($race->get_num_of_upcoming_races() / $num_of_results);

    if ($page > $num_of_pages || $page < 1) {
        $json = json_encode(array("invalidParameters" => true));
        header("Content-Type: application/json");
        echo $json;
    } else {
        $data = $race->get_upcoming_races($page, $num_of_results);
        while ($row = $data->fetch_object()) {
            if ($row) {
                array_push($upcoming, [
                    "race_id" => $row->utrka_id,
                    "race" => $row->naziv,
                    "due_date" => date("d.m.Y", strtotime($row->rok_prijave)),
                    "race_type" => $row->tip_utrke,
                    "country" => $row->drzava
                ]);
            }
        }

        $json = json_encode($upcoming);

        header("Content-Type: application/json");
        echo $json;
    }