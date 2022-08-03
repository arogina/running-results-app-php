<?php
    require_once "../klase/db.class.php";
    require_once "../klase/drzava.class.php";

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $num_of_results = 5;

    $country = new Country();
    $countries = array();

    $num_of_pages = ceil($country->select_num_of_countries() / $num_of_results);

    if ($page > $num_of_pages || $page < 1) {
        $json = json_encode(array("invalidParameters" => true));
        header("Content-Type: application/json");
        echo $json;
    } else {
        $data = $country->select_all_countries_formatted($page, $num_of_results);
        while ($row = $data->fetch_object()) {
            $moderators = $country->select_moderator_per_country($row->drzava_id);
            if ($row) {
                array_push($countries, [
                    "country_id" => $row->drzava_id,
                    "country" => $row->naziv,
                    "label" => $row->oznaka,
                    "continent" => $row->kontinent,
                    "moderators" => $moderators
                ]);
            }
        }

        $json = json_encode($countries);

        header("Content-Type: application/json");
        echo $json;
    }