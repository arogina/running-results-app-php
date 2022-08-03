<?php
    require_once "../klase/db.class.php";
    require_once "../klase/etapa.class.php";
    require_once "../klase/sesija.class.php";

    Session::create_session();

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $num_of_results = 5;

    $stage = new Stage();
    $stages = array();

    $num_of_pages = ceil($stage->select_num_of_stages() / $num_of_results);

    if ($page > $num_of_pages || $page < 1) {
        $json = json_encode(array("invalidParameters" => true));
        header("Content-Type: application/json");
        echo $json;
    } else {
        $data = "";
        if (isset($_SESSION["user_id"]) && $_SESSION["role"] == 3) {
            $data = $stage->select_all_stages_formatted($page, $num_of_results);
        } else {
            $data = $stage->select_all_stages_formatted($page, $num_of_results, false, $_SESSION["user_id"]);
        }
        while ($row = $data->fetch_object()) {
            if ($row) {
                array_push($stages, [
                    "stage_id" => $row->etapa_id,
                    "name" => $row->naziv,
                    "start_time" => date('d.m.Y h:i', strtotime($row->vrijeme_pocetka)),
                    "closed" => $row->zavrsena == 1 ? "Završena" : "Nije završena",
                    "race" => $row->utrka,
                ]);
            }
        }

        $json = json_encode($stages);

        header("Content-Type: application/json");
        echo $json;
    }