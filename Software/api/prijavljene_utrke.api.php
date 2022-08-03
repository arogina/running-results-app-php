<?php
    require_once "../klase/db.class.php";
    require_once "../klase/utrka.class.php";
    require_once "../klase/sesija.class.php";

    Session::create_session();

    if (isset($_SESSION["user_id"])) {
        $page = 1;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        $num_of_results = 5;

        $race = new Race();
        $signed = array();

        $num_of_pages = ceil($race->get_num_of_signed_races($_SESSION["user_id"]) / $num_of_results);

        if ($page > $num_of_pages || $page < 1) {
            $json = json_encode(array("invalidParameters" => true));
            header("Content-Type: application/json");
            echo $json;
        } else {
            $data = $race->get_signed_races($_SESSION["user_id"], $page, $num_of_results);
            while ($row = $data->fetch_object()) {
                if ($row) {
                    array_push($signed, [
                        "race_id" => $row->utrka_id,
                        "race" => $row->naziv,
                        "sign_date" => date("d.m.Y", strtotime($row->datum_prijave)),
                        "birth_date" => $row->godina_rodenja,
                        "picture" => $row->slika
                    ]);
                }
            }

            $json = json_encode($signed);
    
            header("Content-Type: application/json");
            echo $json;
        }
    } else {
        $json = json_encode(array("userSigned" => false));
        header("Content-Type: application/json");
        echo $json;
    }