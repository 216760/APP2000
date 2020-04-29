<?php
/*************************************************************************************************************** 
*  TIL INFORMASJON:                                                                                            *
*                                                                                                              *
* I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene nedenfor                       *
* Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden.            *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                      *
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer. 	           *
*                                                                                                              *
* Kilde: https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                *
*                                                                                                              *
*                                                                                                              *
***************************************************************************************************************/

// ------------------------------------------------------------------------------------------------------------ //
// START                                                                                                        //
// Dette oppsettet er gjenbrukt fra gitlab repoet PHP Simple Login and Registration Script. Vi har selvfølgelig //
// tilpasset databsehost, databasenavn, brukernavn og passord til itfag.usn.no                                  //
//                                                                                                              //
// Kilde:https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                 //
// ------------------------------------------------------------------------------------------------------------ //

$databaseHost     = 'itfag.usn.no';
$databaseName     = 'v20app2000db2';
$databaseUsername = 'v20app2000u2';
$databasePassword = '8TW6qOzYkosGDhmu';
// ----------------------------------------------------------------------------------------------------
// Kobler til database
// ----------------------------------------------------------------------------------------------------
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); // mysqli_connect er en funksjonn som tar inn kredentialene og 
                                                                                              // kobler seg til databasen

// ------------------------------------------------------------------------------------------------------------ //
// STOPP                                                                                                        //
// Dette oppsettet er gjenbrukt fra gitlab repoet PHP Simple Login and Registration Script. Vi har selvfølgelig //
// tilpasset databsehost, databasenavn, brukernavn og passord til itfag.usn.no                                  //
//                                                                                                              //
// Kilde:https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                 //
// ------------------------------------------------------------------------------------------------------------ //
?>