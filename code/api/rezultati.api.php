<?php
    require_once "../klase/db.class.php";
    require_once "../klase/etapa.class.php";

    $stage_id = $_COOKIE["stageid"];

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $num_of_results = 5;

    $stage = new Stage();
    $results = array();

    $num_of_pages = ceil($stage->select_num_of_results_per_stage($stage_id) / $num_of_results);

    if ($page > $num_of_pages || $page < 1) {
        $json = json_encode(array("invalidParameters" => true));
        header("Content-Type: application/json");
        echo $json;
    } else {
        $data = $stage->select_results_per_stage_formatted($stage_id, $page, $num_of_results);
        $i = 1;
        while ($row = $data->fetch_object()) {
            if ($row) {
                array_push($results, [
                    "place" => $i,
                    "username" => $row->korisnicko_ime,
                    "race" => $row->utrka,
                    "time" => $row->vrijeme,
                    "points" => $row->bodovi,
                    "picture" => $row->slika
                ]);
                $i++;
            }
        }

        $json = json_encode($results);

        header("Content-Type: application/json");
        echo $json;
    }