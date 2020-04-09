<!----------------------------------------------------------------------------------------------------------------------------------------------

TIL INFORMASJON: 

I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

Kilde: 

https://www.youtube.com/playlist?list=PLk7v1Z2rk4hiJD24gvXHxzkfA2twWvxXV
https://www.w3schools.com/php/php_mysql_prepared_statements.asp
https://www.php.net/manual/en/mysqli.prepare.php
https://www.php.net/manual/en/mysqli-stmt.bind-param.php

Kodet og tilpasset av: Henrik Solnør Johansen og Vigleik Espeland Stakseng og

------------------------------------------------------------------------------------------------------------------------------------------------> 

<?php
session_start();

// ----------------------------------------------------------------------------------------------------
// Kobler til database
// ----------------------------------------------------------------------------------------------------

 include_once("db-config.php"); // Inkluderer db-config.php 

// ----------------------------------------------------------------------------------------------------
// Setter opp kredentialer
// ----------------------------------------------------------------------------------------------------

//Kodet og tilpasset av: Anders Koo og Henrik Solnør Johansen START
$name = trim($_POST['name']); // Sjekker om variaber er deklarert og fjerner whitespace på start og slutt
$email = trim($_POST['email']); // Sjekker om variaber er deklarert og fjerner whitespace på start og slutt
$message = trim($_POST['message']); // Sjekker om variaber er deklarert og fjerner whitespace på start og slutt
$subject = trim($_POST['subject']); // Sjekker om variaber er deklarert og fjerner whitespace på start og slutt
$user_id = $_SESSION['id'];



// ----------------------------------------------------------------------------------------------------
// Forbereder insert spørring mot databasen med prepare
// ----------------------------------------------------------------------------------------------------

// mysqli_prepare er en funksjon som bruker til å sikre mot SQL injection
$stmt = mysqli_prepare($mysqli,"INSERT INTO feedback(name, email, message, subject, user_id) VALUES(?,?,?,?,?)");

// ----------------------------------------------------------------------------------------------------
// Utfører spørring mot databaseb. mysqli_stmt_bind_param er er metode for å "binde" sammen de forskjellige input 
// datatypene. Bruker variablene blir først definert med "ssssi" (s=string) (i=integer), og deretter legges dem inn.
// mysqli_stmt_bind_param og mysqli_prepare metodene hører sammen og er en måte å sikre mot sql injection. 
// ----------------------------------------------------------------------------------------------------

//Kodet og tilpasset av: Anders Koo og Henrik Solnør Johansen STOPP
mysqli_stmt_bind_param($stmt,"ssssi", $name, $email, $message, $subject, $user_id);
if( ($stmt)) //Utfører SQL statement
{
    echo 'success'; // Hvis utførelsen er vellyket sendes en success status
}else{
    echo 'failure'; // Hvis ikke sendes en feil status. 
}

//--------------------------------------------------------------------------------------------------------------------
?>
