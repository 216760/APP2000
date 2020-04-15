<?php
/************************************************************************************************************
* TIL INFORMASJON:                                                                                          *
                                                                                                            *
* I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.           *
* Dette er også dokumentert under kildebruk i rapporten og markert i selve koden.                           *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                   *
* Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer.                                  *
* Vi ser først på en demo av hvordan et eksempel virker, koder oss gjennom guiden for å lære hva som skjer. *
* Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke.    *
                                                                                                            *
* Linker til gjenbrukt kode:                                                                                *
                                                                                                            *
*   https://www.youtube.com/watch?v=cgvDMUrQ3vA                                                             *
*                                                                                                           *
*                                                                                                           *
                                                                                                            *
                                                                                                            *
                                                                                                            *
*Medlemmer som har bidratt: Henrik Solnør Johansen, Andreas Knutsen, Anders Koo og Vigleik Espeland Stakseng*
                                                                                                            *
*************************************************************************************************************/

    if(!isset($_SESSION)) { 
        session_start(); // Oppretter unik sessjon til bruker hvis den ikke allerede eksisterer
    } 
    
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