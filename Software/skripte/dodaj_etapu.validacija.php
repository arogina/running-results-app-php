<?php
    function check_if_empty($user_data) {
        foreach ($user_data as $key => $value) {
            if (empty($value)) return true;
        }
        
        return false;
    }

    if (isset($_POST["submit"])) {
        if (check_if_empty($_POST)) {
            header("location: ../obrasci/dodaj_etapu.php?error=emptyvalues");
            exit();
        }

        $stage_name = $_POST["stage"];
        $start_date = $_POST["start-date"];
        $race = $_POST["race"];

        $stage = new Stage();

        if (isset($_COOKIE["stageid"])) {
            if ($stage->update_stage($_COOKIE["stageid"], $stage_name, $start_date, $race)) {
                header("location: ../obrasci/dodaj_etapu.php?stage=updated");
                Cookie::delete_cookie("stageid");
                exit();
            }
        } else {
            if ($stage->create_stage($stage_name, $start_date, $race)) {
                header("location: ../obrasci/dodaj_etapu.php?stage=created");
                exit();
            }
        }
    }