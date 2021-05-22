<?php
/************************************************************************************************************
* TIL INFORMASJON:                                                                                          * 
*                                                                                                           *    
* I denne filen ligger det kode som er hentet og tilpasset egen løsning fra kildene nedenfor.               *
* Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden.         * 
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                   *
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer. 	        *
*                                                                                                           *
* Kilde:                                                                                                    * 
* https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ                                  * 
* https://stackoverflow.com/questions/35931377/get-id-for-a-specific-user-in-mysql-database-in-php          *
*                                                                                                           * 
* Vi har med vilje laget informasjonsboksene i koden med ulike størrelser 									                         * 
* for å kunne skille dem fra hverandre.                                                                     *  
*                                                                                                           * 
*************************************************************************************************************/ 
 
// ------------------------------------------------------------------------------------------------- //
// START                                                                                             //
// Alle CRUD operasjonene har vi lært via eksempler fra Youtube kanalen Funda Of Web IT.             //
// Denne koden er hentet fra og tilpasset egen løsning fra denne Youtube kanalen, part 1-6           //
//                                                                                                   //
// Kilde: https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ                   //
//                                                                                                   //   
// Kodet og tilpasset av: Anders Koo                                                                 //
// ------------------------------------------------------------------------------------------------- //

// -------------------------------------------------------------------------------------------------- //
// Oppretter unik session for bruker                                                                  //
// -------------------------------------------------------------------------------------------------- //

session_start();// Det er bare brukere med tildelt sessions id fra session_start() som kan opprette abonnement

// ---------------------------------------------------------------------------------------------------- //
// Setter opp forbindelse med databasen                                                                 //
// ---------------------------------------------------------------------------------------------------- //

include('db-config.php'); // Inkluderer db-config.php

// ---------------------------------------------------------------------------------------------------- //
// Registreringsknapp                                                                                   //
// ---------------------------------------------------------------------------------------------------- //

if(isset($_POST['registerbtn'])) { // Sjekker at variabel er deklarert og at registerbtn knappen er klikket på 
    // Informasjon om abonnement
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);   // Henter ut data med $_POST og sikrer mot SQL injection
    $start_date = mysqli_real_escape_string($mysqli, $_POST['start_date']);     // Henter ut data med $_POST og sikrer mot SQL injection
    $end_date =  mysqli_real_escape_string($mysqli, $_POST['end_date']);        // Henter ut data med $_POST og sikrer mot SQL injection
    

    // -------------------------------------------------------------------------------------------------------- //
    // user_id i cards-tabellen blir automatisk opprettet når registrert bruker lager et abonnement             //
    // https://stackoverflow.com/questions/35931377/get-id-for-a-specific-user-in-mysql-database-in-php         //
    // Oppretter user_id variabel for cards tabellen som en sessions variabel.Dette for å identifisere bruker   //
    // -------------------------------------------------------------------------------------------------------- //
    $user_id = $_SESSION['id']; 
    
    // -------------------------------------------------------------------------------------------------------- //

    
    // ---------------------------------------------------------------------------------------------------- //
    // Setter opp spørrevariabel for registrering av abonnement                                             //
    // ---------------------------------------------------------------------------------------------------- //

    // Spørring som setter inn nytt abonnement i databasen basert på user_id (spesifikk bruker)
    $queryReg = "INSERT INTO cards (description, start_date, end_date, user_id) VALUES ('$description', '$start_date','$end_date', '$user_id')"; //  Spørring som setter inn data i databasen
    $queryDB = mysqli_query($mysqli, $queryReg); // mysqli_query er en funksjon som utfører spørring mot databasen

    // Om spørringen er vellyket blir bruker videresendt tilbake til dashbord
    if($queryDB) {   

        header('Location: dashboard.php');    

    } else{
        // Hvis ikke blir det presentert en feilmelding
        echo "Something went wrong/Noe gikk galt";
    }

} 


// ---------------------------------------------------------------------------------------------------- //
// Oppdateringsknapp                                                                                    //
// ---------------------------------------------------------------------------------------------------- //

if(isset($_POST['updatebtn'])) {    // Sjekker at variabel er deklarert og at updatebtn knappen er klikket på 
    $id = $_POST['edit_id'];        // Henter riktig id med $_POST, slik at vi vet hvilket abonnement vi skal oppdatere
   
   // Informasjon om abonnement
    $description = mysqli_real_escape_string($mysqli , $_POST['edit_description']);   // Henter ut data med $_POST og sikrer mot SQL injection
    $start_date = mysqli_real_escape_string($mysqli , $_POST['edit_date_from']);      // Henter ut data med $_POST og sikrer mot SQL injection
    $end_date = mysqli_real_escape_string($mysqli , $_POST['edit_date_to']);          // Henter ut data med $_POST og sikrer mot SQL injection

    // Spørring som oppdaterer spesifikt abonnement i databasen basert på id i cards tabell
    $queryUpdate = "UPDATE cards SET description='$description', start_date='$start_date', end_date='$end_date' WHERE id='$id' ";
    $queryDB = mysqli_query($mysqli , $queryUpdate); // mysqli_query er en funksjon som utfører spørring mot databasen

    // Om spørringen er vellyket blir bruker videresendt tilbake til dashbord
    if($queryDB) {

        header('Location: dashboard.php');

    } else{
        // Hvis ikke blir det presentert en feilmelding
        echo "Something went wrong/Noe gikk galt";
    }
    
}


// ---------------------------------------------------------------------------------------------------- //
// Sletteknapp                                                                                          //
// ---------------------------------------------------------------------------------------------------- //

if(isset($_POST['delete_btn'])) { // Sjekker at variabel er deklarert og at updatebtn knappen er klikket på 
    $id = $_POST['delete_id'];  // Henter ut id med $_POST slik at vi vet hvilket abonnement vi skal slette i databasen

    $queryDelete = "DELETE FROM cards WHERE id='$id'";  // Spørring som sletter spesifikt abonnement fra databasen basert på id
    $queryDB = mysqli_query($mysqli , $queryDelete); // mysqli_query er en funksjon som utfører spørring mot databasen

    // Om spørringen er vellyket blir bruker videresendt tilbake til dashbord
    if($queryDB) {

        header('Location: dashboard.php');
        
    }  else{
        // Hvis ikke blir det presentert en feilmelding
        echo "Something went wrong/Noe gikk galt";
    }

}

// --------------------------------------------------------------------------------------------------//
// STOPP                                                                                             //
// Alle CRUD operasjonene har vi lært via eksempler fra Youtube kanalen Funda Of Web IT.             //
// Denne koden er hentet fra og tilpasset egen løsning fra denne Youtube kanalen, part 1-6           //
//                                                                                                   //
// Kilde: https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ                   //
//                                                                                                   //   
// Kodet og tilpasset av: Anders Koo                                                                 //
// --------------------------------------------------------------------------------------------------//

?>
