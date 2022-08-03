<?php
     $directory = getcwd();
     $path = dirname($_SERVER['REQUEST_URI']);
 
     require_once "$directory/zaglavlje.php";
 
     $title = "Trčanje - O autoru";
     $subtitle = "O autoru";
 
     $smarty->assign("path", $path);
     $smarty->assign("directory", $directory);
     $smarty->assign("title", $title);
     $smarty->assign("subtitle", $subtitle);
 
     $smarty->display("zaglavlje.tpl");
     $smarty->display("o_autoru.tpl");
     $smarty->display("podnozje.tpl");