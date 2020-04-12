<?php
/************************************************************************************************************
* TIL INFORMASJON:                                                                                          *
                                                                                                            *
* I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.           *
* Dette vil også bli dokumentert under kildebruk i rapporten og markert i selve koden.                      *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                   *
* Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer.                                  *
* Vi ser først på en demo av hvordan et eksempel virker, koder oss gjennom guiden for å lære hva som skjer. * 
* Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke.    *
************************************************************************************************************/


//------------------------------------------------------------------------------------------------------------------//
// START                                                                                                            //
// Denne koden hentet gitlab repoet PHP Simple Login and Registration Script.                                       //
//                                                                                                                  //
// Kilde: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s                                                        //
//------------------------------------------------------------------------------------------------------------------//


// ----------------------------------------------------------------------------------------------------
// Før session slettes gjenopprettes den 
// ----------------------------------------------------------------------------------------------------

session_start();

// ----------------------------------------------------------------------------------------------------
// Ødelegger alle sessions data før utlogging
// ----------------------------------------------------------------------------------------------------

session_destroy();

// ----------------------------------------------------------------------------------------------------
// Videresender bruker til login.php etter utlogging
// ----------------------------------------------------------------------------------------------------

header("location: index.php");

//------------------------------------------------------------------------------------------------------------------//
// STOPP                                                                                                            //
// Denne koden hentet gitlab repoet PHP Simple Login and Registration Script.                                       //
//                                                                                                                  //
// Kilde: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s                                                        //
//------------------------------------------------------------------------------------------------------------------//
?>

