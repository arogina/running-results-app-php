<?php
    require_once("../klase/db.class.php");
    require_once("../klase/etapa.class.php");

    if (isset($_POST["userid"]) && isset($_POST["time"]) && isset($_POST["finished"]) && isset($_COOKIE["stageid"])) {
        $user_id = $_POST["userid"];
        $stage_id = $_COOKIE["stageid"];
        $time = $_POST["time"];
        $finished = $_POST["finished"];

        $stage = new Stage();

        $stage_data = $stage->select_stage($stage_id);
        
        $response = array("closedStage" => true);
        if ($stage_data->zavrsena != 1) {
            $response = array("resultSaved" => true);
            if (!$stage->save_result($user_id, $stage_id, $time, $finished)) {
                $response = array("resultSaved" => false);
            }
        }
        
        $json = json_encode($response);

        header("Content-Type: application/json");
        echo $json;
    } else {
        $response = array("invalidParameters" => true);
        $json = json_encode($response);

        header("Content-Type: application/json");
        echo $json;
    }