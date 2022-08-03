<?php
    require_once "../klase/db.class.php";
    require_once "../klase/etapa.class.php";

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $num_of_results = 5;

    $sort = null;
    if (isset($_GET["sort"]) && $_GET["sort"] != "none") {
        $sort = $_GET["sort"];
    }

    $stage = new Stage();
    $stages = array();

    $num_of_pages = ceil($stage->select_num_of_finished_stages() / $num_of_results);

    if ($page > $num_of_pages || $page < 1) {
        $json = json_encode(array("invalidParameters" => true));
        header("Content-Type: application/json");
        echo $json;
    } else {
        $data = "";
        $data = $stage->select_finished_stages($page, $num_of_results);

        $i = 1;
        while ($row = $data->fetch_object()) {
            if ($row) {
                array_push($stages, [
                    "place" => $i,
                    "username" => $row->korisnicko_ime,
                    "stage_num" => $row->broj_etapa
                ]);
                $i++;
            }
        }

        $json = json_encode($stages);

        header("Content-Type: application/json");
        echo $json;
    }