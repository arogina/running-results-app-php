<?php
    require_once "./klase/sesija.class.php";

    Session::create_session();
    Session::close_session();

    header("location: ./index.php");
    exit();