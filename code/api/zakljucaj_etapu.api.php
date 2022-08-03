<?php
    require_once "../klase/db.class.php";
    require_once "../klase/etapa.class.php";

    if (isset($_COOKIE["stageid"])) {
        $stage_id = $_COOKIE["stageid"];

        $stage = new Stage();
        $all_competitiors_finished = true;

        if (!$stage->check_finished_competitors($stage_id)) {
            $all_competitiors_finished = false;
        }

        $response = "";
        if ($all_competitiors_finished) {
            $stage->close_stage($stage_id);
            $response = array("updated" => true);
            $results = $stage->select_results_per_stage($stage_id);
            $stage->update_points($results);
        } else $response = array("updated" => false);

        $json = json_encode($response);

        header("Content-Type: application/json");
        echo $json;
    }