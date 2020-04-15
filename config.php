<?php
session_start(); // Oppretter unik sessjon til bruker 
    
    // Oppretter $_SESSION['lang'] og gir den en verdi 'en' hvis den ikke har en verdi allerede
    if (!isset($_SESSION['lang']))
        $_SESSION['lang'] = "en";
    // Sjekker at $_SESSION['lang'] IKKE er samme $_SESSION['lang'] som allerede har blitt deklarert
    else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
        // Henter verdi til $_SESSION['lang'], og setter den til samme verdi som $_GET-funksjonen returnerer
        if ($_GET['lang'] == "en")
            $_SESSION['lang'] = "en";
        // Henter verdi til $_SESSION['lang'], og setter den til samme verdi som $_GET-funksjonen returnerer
        else if ($_GET['lang'] == "no")
            $_SESSION['lang'] = "no";
    }

    require_once "includes/" . $_SESSION['lang'] . ".php";
?>