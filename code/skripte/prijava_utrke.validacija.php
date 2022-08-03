<?php
    require_once "$directory/klase/db.class.php";
    require_once "$directory/klase/utrka.class.php";

    function check_extension($extension) {
        $allowed = array("png", "jpg");

        return in_array($extension, $allowed);
    }

    function check_size($size) {
        return $size < 1000000;
    }

    function check_date($date) {
        $regex = "/^[1-2][0-9]{1,3}$/";

        return preg_match($regex, $date);
    }

    if (isset($_POST["submit"])) {
        $race_id = $_POST["race"];
        $birth_date = $_POST["birth-date"];

        $race = new Race();

        if (!isset($_COOKIE["raceid"])) {
            if ($race->get_signed_race($_SESSION["user_id"], $race_id)) {
                header("location: ../obrasci/prijava_utrke.php?error=alreadysigned");
                exit();
            }
        }

        if (empty($birth_date)) {
            header("location: ../obrasci/prijava_utrke.php?error=emptydate");
            exit();
        }

        if (empty($_FILES["picture"]["tmp_name"])) {
            header("location: ../obrasci/prijava_utrke.php?error=emptyfile");
            exit();
        }

        $file = $_FILES["picture"]["tmp_name"];
        $name = $_SESSION["user_id"] . ".jpg";
        $size = $_FILES["picture"]["size"];
        $extension = pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION);

        if (!check_extension($extension)) {
            header("location: ../obrasci/prijava_utrke.php?error=badextension");
            exit();
        }

        if (!check_size($size)) {
            header("location: ../obrasci/prijava_utrke.php?error=largefile");
            exit();
        }

        if (!check_date($birth_date)) {
            header("location: ../obrasci/prijava_utrke.php?error=baddate");
            exit();
        }

        $upload_directory = "$directory/slike/$name";

        if(is_uploaded_file($file)) {
            if (move_uploaded_file($file, $upload_directory)) {
                if (isset($_COOKIE["raceid"])) {
                    if ($race->update_signed_race($_SESSION["user_id"], $race_id, $birth_date, "slike/$name")) {
                        header("location: ../obrasci/prijava_utrke.php?race=updated");
                        Cookie::delete_cookie("raceid");
                        exit();
                    }
                } else {
                    if ($race->sign_user_on_race($_SESSION["user_id"], $race_id, $birth_date, "slike/$name")) {
                        header("location: ../obrasci/prijava_utrke.php?race=signed");
                        exit();
                    }
                }
            }
        } else {
            header("location: ../obrasci/prijava_utrke.php?success=false");
            exit();
        }
    }