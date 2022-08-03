<?php
    require_once "../klase/db.class.php";
    require_once "../klase/utrka.class.php";

    if (isset($_POST["raceid"])) {
        $race_id = $_POST["raceid"];

        $race = new Race();
        $races = $race->check_stages();
        $all_stages_closed = true;

        while ($row = $races->fetch_object()) {
            if ($row) {
                if ($row->utrka_id == $race_id) {
                    $all_stages_closed = false;
                    break;
                }
            }
        }

        $response = array("updated" => false);
        if ($all_stages_closed) {
            $race->close_race($race_id);
            $response = array("updated" => true);
        }

        $json = json_encode($response);

        header("Content-Type: application/json");
        echo $json;
    }