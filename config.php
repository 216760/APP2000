<?php
    // session_start();

    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = "en";
    }else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
        if ($_GET['lang'] == "en")
            $_SESSION['lang'] = "en";
        else if ($_GET['lang'] == "no")
            $_SESSION['lang'] = "no";
    }

        require_once "APP2000/" . $_SESSION['lang'] . ".php";
    
?>