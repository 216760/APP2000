<!--------------------------------------------------------------------------------------------------------------------

TIL INFORMASJON: 

I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

Kilde:
https://gitlab.com/tutorialsclass/php-simple-login-registration-script

-------------------------------------------------------------------------------------------------------------------->


<?php

// ----------------------------------------------------------------------------------------------------
// Setter opp kredentialer
// ----------------------------------------------------------------------------------------------------

$databaseHost     = 'itfag.usn.no';
$databaseName     = 'v20app2000db2';
$databaseUsername = 'v20app2000u2';
$databasePassword = 'pw2';
// ----------------------------------------------------------------------------------------------------
// Kobler til database
// ----------------------------------------------------------------------------------------------------
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Dere får feil med denne syntaksen:
// $mysqli = mysqli_connect($databaseHost, $databaseName, $databaseUsername, $databasePassword);

// ----------------------------------------------------------------------------------------------------
// 
// ----------------------------------------------------------------------------------------------------
?>