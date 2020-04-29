<?php
/************************************************************************************************************
* TIL INFORMASJON:                                                                                          *
*                                                                                                           *
* I denne filen ligger det gjenbrukt kode som er funnet på linkene nedenfor.                                *
* Dette er også dokumentert under kildebruk i rapporten og markert i selve koden.                           *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                   *
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer. 	        *
*                                                                                                           * 
* Kilde:                                                                                                    * 
* https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                    * 
*                                                                                                           *
************************************************************************************************************/


//------------------------------------------------------------------------------------------------------------------//
// START                                                                                                            //
// Denne koden hentet gitlab repoet PHP Simple Login and Registration Script.                                       //
//                                                                                                                  //
// Kilde: https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                    //
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
// Kilde: https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                    //
//------------------------------------------------------------------------------------------------------------------//
?>

