<?php
/**
* 
* TIL INFORMASJON:
*  
* I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
* Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
* Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

* Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
* Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

* Denne koden er hentet fra og tilpasset egen løsning fra denne Youtube kanalen, part 1-6
* https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ

 **/ 

// Medlemmer som har bidratt: Anders Koo


// ----------------------------------------------------------------------------------------------------
// Oppretter unik session for bruker
// ----------------------------------------------------------------------------------------------------

session_start();

// ----------------------------------------------------------------------------------------------------
// Setter opp forbindelse med databasen
// ----------------------------------------------------------------------------------------------------

include('includes/db-config.php'); // Inkluderer db-config.php



if(isset($_POST['registerbtn'])) // Sjekker at variabel er deklarert og at registerbtn knappen er klikket på 
{
    // Informasjon om abonnement
    $description = mysqli_real_escape_string($mysqli , $_POST['description']);   // Sjekker at variabel er deklarert og sikrer mot SQL injection
    $start_date = mysqli_real_escape_string($mysqli , $_POST['start_date']);     // Sjekker at variabel er deklarert og sikrer mot SQL injection
    $end_date =  mysqli_real_escape_string($mysqli ,$_POST['end_date']);         // Sjekker at variabel er deklarert og sikrer mot SQL injection
    $user_id = $_SESSION['id']; // Oppretter user_id variabel og gir den verdien id fra session. 

// ----------------------------------------------------------------------------------------------------
// Setter opp spørrevariabel for registrering av abonnement
// ----------------------------------------------------------------------------------------------------

// Spørring som setter inn nytt abonnement i databasen
$queryReg = "INSERT INTO cards (description, start_date, end_date, user_id) VALUES ('$description', '$start_date','$end_date', '$user_id')"; //  Spørring som setter inn data i databasen
$queryDB = mysqli_query($mysqli , $queryReg); // mysqli_query er en funksjon som utfører spørring mot databasen



    if($queryDB){   
        echo "Saved";
        $_SESSION['subOk'] = "New subscription is successfully added!";
        header('Location: dashboard.php');
    
    }
    } else {
        echo "Not Saved";
        $_SESSION['subError'] = "Subscription could not be added!";
        header('Location: dashboard.php');
    }



// ----------------------------------------------------------------------------------------------------
// Redigeringsknapp
// ----------------------------------------------------------------------------------------------------

    if(isset($_POST['edit_btn']))   // Sjekker at variabel er deklarert og at edit_btn knappen er klikket på 
    {
        $id = $_POST['edit_id'];    // Sjekker at variabel er deklarert
        
        $queryReg = "SELECT * FROM cards WHERE id='$id' ";  // Spørring som henter spesifikk abonnement fra databasen
        $queryDB = mysqli_query($mysqli , $query);       // Utfører spørring mot databasen
    }

// ----------------------------------------------------------------------------------------------------
// Oppdateringsknapp
// ----------------------------------------------------------------------------------------------------
if(isset($_POST['updatebtn'])) {    // Sjekker at variabel er deklarert og at updatebtn knappen er klikket på 
    $id = $_POST['edit_id'];        // Sjekker at variabel er deklarert
   
   // Informasjon om abonnement
    $description = mysqli_real_escape_string($mysqli , $_POST['edit_description']);   // Sjekker at variabel er deklarert og sikrer mot SQL injection
    $start_date = mysqli_real_escape_string($mysqli , $_POST['edit_date_from']);      // Sjekker at variabel er deklarert og sikrer mot SQL injection
    $end_date = mysqli_real_escape_string($mysqli , $_POST['edit_date_to']);          // Sjekker at variabel er deklarert og sikrer mot SQL injection

    // Spørring som oppdaterer spesifikt abonnement i databasen
    $queryEdit = "UPDATE cards SET description='$description', start_date='$start_date', end_date='$end_date' WHERE id='$id' ";
    $queryDB = mysqli_query($mysqli , $queryEdit); // mysqli_query er en funksjon som utfører spørring mot databasen

    if($queryDB) {
        $_SESSION['subOk'] = "New subscription is successfully updated!";
        header('Location: dashboard.php');
    } else {
        $_SESSION['subError'] = "Subscription could not be updated";
        header('Location: dashboard.php');
    }
}


// ----------------------------------------------------------------------------------------------------
// Sletteknapp
// ----------------------------------------------------------------------------------------------------
if(isset($_POST['delete_btn'])) // Sjekker at variabel er deklarert og at updatebtn knappen er klikket på 
{
    $id = $_POST['delete_id'];  // Sjekker at variabel er deklarert

    $queryDelete = "DELETE FROM cards WHERE id='$id'";  // Spørring som sletter spesifikt abonnement fra databasen
    $queryDB = mysqli_query($mysqli , $queryDelete); // mysqli_query er en funksjon som utfører spørring mot databasen

    if($queryDB) {
        $_SESSION['subOk'] = "Subscription is successfully deleted!";
        header('Location: dashboard.php');
    }
    else {
        $_SESSION['subError'] = "Subscription could NOT be deleted";
        header('Location: dashboard.php');
    }
}

// ----------------------------------------------------------------------------------------------------
//  
// ----------------------------------------------------------------------------------------------------



?>
