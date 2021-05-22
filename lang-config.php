<?php
/************************************************************************************************************
* TIL INFORMASJON:                                                                                          *
*                                                                                                           *
* I denne filen ligger det gjenbrukt kode som er funnet på linkene oppsummert under.                        *
* Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden.         *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                   *
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer.          *
*                                                                                                           *
* Linker til gjenbrukt kode:                                                                                *
*                                                                                                           *
* https://www.youtube.com/watch?v=cgvDMUrQ3vA                                                               * 
* https://drive.google.com/file/d/1WM7zpPmlS7JFFfdn6PfsdxlT2iS5zOSF/view                                    * 
*                                                                                                           *
*                                                                                                           *
*************************************************************************************************************/



    if(!isset($_SESSION)) { 
        session_start(); // Oppretter unik sessjon til bruker hvis den ikke allerede eksisterer
    } 
    
    // Oppretter $_SESSION['lang'] og gir den en verdi 'en' hvis den ikke har en verdi allerede
    if (!isset($_SESSION['lang']))
        $_SESSION['lang'] = "en";
    // Sjekker at $_SESSION['lang'] IKKE er samme $_SESSION['lang'] som allerede har blitt deklarert
    elseif (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
        // Henter verdi til $_SESSION['lang'], og setter den til samme verdi som $_GET-funksjonen returnerer
        if ($_GET['lang'] == "en")
            $_SESSION['lang'] = "en";
        // Henter verdi til $_SESSION['lang'], og setter den til samme verdi som $_GET-funksjonen returnerer
        elseif ($_GET['lang'] == "no")
            $_SESSION['lang'] = "no";
    }

    require_once "includes/" . $_SESSION['lang'] . ".php";
?>
