<?php
/*****************************************************************************************************************
*                                                                                                                *
*TIL INFORMASJON:                                                                                                *
*                                                                                                                *
* I denne filen ligger det kode som er hentet og tilpasset egen løsning fra kildene nedenfor.                    *
* Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden.              *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                        *
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer. 	           *
*                                                                                                                *
* Kilde:                                                                                                         *
*   https://www.youtube.com/playlist?list=PLk7v1Z2rk4hiJD24gvXHxzkfA2twWvxXV                                     * 
*   https://www.youtube.com/watch?v=XV9x17zVZFU&list=PLk7v1Z2rk4hiJD24gvXHxzkfA2twWvxXV&index=3&t=0s             *
*   https://websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injection                         *
*                                                                                                                *
*                                                                                                                *                                                                                       
*                                                                                                                *
*                                                                                                                *       
* Kodet og tilpasset av: Henrik Solnør Johansen og Vigleik Espeland Stakseng og Anders Koo                       *          
*                                                                                                                *
*****************************************************************************************************************/

session_start(); // Gjenopptar session

// ----------------------------------------------------------------------------------------------------
// Kobler til database
// ----------------------------------------------------------------------------------------------------

include_once("db-config.php"); // Inkluderer db-config.php 

// ----------------------------------------------------------------------------------------------------
// Setter opp kredentialer
// ----------------------------------------------------------------------------------------------------

//Kodet og tilpasset av: Anders Koo og Henrik Solnør Johansen START

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING); // Henter ut data med $_POST og fjerner whitespace på start og slutt
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Henter ut data med $_POST og fjerner whitespace på start og slutt
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING); // Henter ut data med $_POST og fjerner whitespace på start og slutt
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING); // Henter ut data med $_POST og fjerner whitespace på start og slutt
$user_id = $_SESSION['id']; // Oppretter en $user_id som er session basert



// ----------------------------------------------------------------------------------------------------
// START 
// Koden under er var i utgangspunktet OOP basert. Vi har gjort den om til procedural. Grunnen til at vi har 
// brukt procedural er mer eller mindre fordi dette er det mest effektive steg for steg metoden å gå frem på 
// for å lære seg grunnleggende php. 
// Link: https://www.youtube.com/watch?v=XV9x17zVZFU&list=PLk7v1Z2rk4hiJD24gvXHxzkfA2twWvxXV&index=3&t=0s
// ----------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------
// Utfører spørring mot databasen. mysqli_stmt_bind_param er er metode for å "binde" sammen de forskjellige input 
// datatypene. Bruker variablene blir først definert med "ssssi" (s=string) (i=integer), og deretter legges dem inn.
// mysqli_stmt_bind_param og mysqli_prepare metodene hører sammen og er en måte å sikre mot sql injection og 
// forberede en spørring 
// Kilde: 
// https://www.youtube.com/watch?v=XV9x17zVZFU&list=PLk7v1Z2rk4hiJD24gvXHxzkfA2twWvxXV&index=3&t=0s
// https://websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injection
// ----------------------------------------------------------------------------------------------------

//Kodet og tilpasset av: Anders Koo og Henrik Solnør Johansen START

$stmt = mysqli_prepare($mysqli,"INSERT INTO feedback(name, email, message, subject, user_id) VALUES(?,?,?,?,?)");
mysqli_stmt_bind_param($stmt,"ssssi", $name, $email, $message, $subject, $user_id);
if(mysqli_stmt_execute($stmt)) { //Utfører SQL statement
    echo 'success'; // Hvis utførelsen er vellyket sendes en success status
} else {
    echo 'failure'; // Hvis ikke sendes en feil status. 
}


//Kodet og tilpasset av: Anders Koo og Henrik Solnør Johansen STOPP

// ----------------------------------------------------------------------------------------------------
// STOPP 
// Koden under er var i utgangspunktet OOP basert. Vi har gjort den om til procedural. Grunnen til at vi har 
// brukt procedural mer eller mindre fordi dette er det mest effektive steg for steg metoden å gå frem på 
// for å lære seg grunnleggende php. 
//
// Link: https://www.youtube.com/watch?v=XV9x17zVZFU&list=PLk7v1Z2rk4hiJD24gvXHxzkfA2twWvxXV&index=3&t=0s
// ----------------------------------------------------------------------------------------------------

?>