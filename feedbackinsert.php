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

------------------------------------------------------------------------------------------------------------------------------------------------> 

<?php


// ----------------------------------------------------------------------------------------------------
// Setter opp kredentialer
// ----------------------------------------------------------------------------------------------------

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];


// ----------------------------------------------------------------------------------------------------
// Kobler til database
// ----------------------------------------------------------------------------------------------------

$url = 'itfag.usn.no';
$username = 'v20app2000u2';
$password = 'pw2';
$db = "v20app2000db2";
$mysqli = mysqli_connect($url, $username, $password, $db); 
if(!$mysqli){
 die('Could not Connect My Sql:' .mysqli_error());
}


// ----------------------------------------------------------------------------------------------------
// Forbereder insert spørring mot databasen med prepare
// ----------------------------------------------------------------------------------------------------



$stmt = $mysqli->prepare("INSERT INTO feedback(name, email, message, subject) VALUES(?,?,?,?)");


// ----------------------------------------------------------------------------------------------------
// Utfører spørring mot databaseb. bind_param er er metode for å "binde" sammen de forskjellige input 
// datatypene. Bruker variablene blir først definert med "ssss" (s=string), og deretter legges dem inn.
// bind_param og prepare metodene hører sammen
// ----------------------------------------------------------------------------------------------------

$stmt->bind_param("ssss", $name, $email, $message, $subject);
if($stmt->execute())
{
    echo 'success';
}else{
    echo 'failure';
}
//--------------------------------------------------------------------------------------------------------------------
?>