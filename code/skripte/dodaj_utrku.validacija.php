<?php
    function check_if_empty($user_data) {
        foreach ($user_data as $key => $value) {
            if (empty($value)) return true;
        }
        
        return false;
    }

    if (isset($_POST["submit"])) {
        if (check_if_empty($_POST)) {
            header("location: ../obrasci/dodaj_utrku.php?error=emptyvalues");
            exit();
        }

        $race_name = $_POST["race"];
        $due_date = $_POST["due-date"];
        $race_type = $_POST["race-type"];
        $country = $_POST["country"];

        $race = new Race();

        if (isset($_COOKIE["raceid"])) {
            if ($race->update_race($_COOKIE["raceid"], $race_name, $due_date, $race_type, $country)) {
                header("location: ../obrasci/dodaj_utrku.php?race=updated&raceid=" . $_COOKIE["raceid"]);
                Cookie::delete_cookie("raceid");
                exit();
            }
        } else {
            if ($race->create_race($race_name, $due_date, $race_type, $country)) {
                header("location: ../obrasci/dodaj_utrku.php?race=created");
                exit();
            }
        }
    }