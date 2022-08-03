<?php
    require_once "$directory/vanjske_biblioteke/smarty-4.0.0/libs/Smarty.class.php";
    require_once "$directory/klase/sesija.class.php";

    Session::create_session();

    $smarty = new Smarty();
    $smarty->setTemplateDir("$directory/predlošci");
    $smarty->setCompileDir("$directory/predlošci_c");