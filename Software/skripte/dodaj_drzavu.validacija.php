<?php
    function check_empty_values($name, $label, $continent) {
        return empty($name) || empty($label) || empty($continent);
    }

    function check_chars($text) {
        $regex = "/[^0-9 ]/";

        return preg_match($regex, $text);
    }

    function check_label_length($label) {
        return strlen($label) <= 3;
    }

    function check_name_length($name) {
        return strlen($name) <= 45;
    }

    function check_continent_length($continent) {
        return strlen($continent) <= 15;
    }

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $label = $_POST["label"];
        $continent = $_POST["continent"];

        if (check_empty_values($name, $label, $continent)) {
            header("location: ../obrasci/dodaj_drzavu.php?error=emptyvalues");
            exit();
        }

        if (!check_label_length($label)) {
            header("location: ../obrasci/dodaj_drzavu.php?error=labellength");
            exit();
        }

        if (!check_name_length($label)) {
            header("location: ../obrasci/dodaj_drzavu.php?error=namelength");
            exit();
        }

        if (!check_continent_length($label)) {
            header("location: ../obrasci/dodaj_drzavu.php?error=continentlength");
            exit();
        }

        if (!check_chars($name)) {
            header("location: ../obrasci/dodaj_drzavu.php?error=namechars");
            exit();
        }

        if (!check_chars($label)) {
            header("location: ../obrasci/dodaj_drzavu.php?error=labelchars");
            exit();
        }

        if (!check_chars($name)) {
            header("location: ../obrasci/dodaj_drzavu.php?error=continetnchars");
            exit();
        }

        $country = new Country();

        if (isset($_COOKIE["countryid"])) {
            if ($country->update_country($_COOKIE["countryid"], $name, $label, $continent)) {
                header("location: ../obrasci/dodaj_drzavu.php?country=updated&countryid" . $_COOKIE["countryid"]);
                Cookie::delete_cookie("countryid");
                exit();
            }
        } else {
            if ($country->create_country($name, $label, $continent)) {
                header("location: ../obrasci/dodaj_drzavu.php?country=created");
                exit();
            }
        }
    }