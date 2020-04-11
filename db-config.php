<?php
/*************************************************************************************************************** 
*  TIL INFORMASJON:                                                                                            *
*                                                                                                              *
* I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.              *
* Dette vil også bli dokumentert under kildebruk i rapporten og markert i selve koden.                         *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                      *
* Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer.                                     *
* Vi ser først på en demo av hvordan et eksempel virker, koder oss gjennom guiden for å lære hva som skjer.    *
* Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke.       *
                                                                                                               *
* Kilde: https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                *
                                                                                                               *
* Medlemmer som har bidratt: Anders Koo                                                                        *
                                                                                                               *
***************************************************************************************************************/

// ------------------------------------------------------------------------------------------------------------ //
// START
// Dette oppsettet er gjenbrukt fra gitlap repoet PHP Simple Login and Registration Script. Vi har selvfølgelig //
// måttet tilpasse host, databasenavn, bruker og passord                                                        //
// Kilde:https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                 //
// ------------------------------------------------------------------------------------------------------------ //

$databaseHost     = 'itfag.usn.no';
$databaseName     = 'v20app2000db2';
$databaseUsername = 'v20app2000u2';
$databasePassword = 'pw2';
// ----------------------------------------------------------------------------------------------------
// Kobler til database
// ----------------------------------------------------------------------------------------------------
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); // mysqli_connect er en funksjonn som tar inn kredentialene og 
                                                                                              // kobler seg til databasen

// ------------------------------------------------------------------------------------------------------------ //
// STOPP
// Dette oppsettet er gjenbrukt fra gitlap repoet PHP Simple Login and Registration Script. Vi har selvfølgelig //
// måttet tilpasse host, databasenavn, bruker og passord.                                                       //
// Kilde:https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                 //
// ------------------------------------------------------------------------------------------------------------ //
?>