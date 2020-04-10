<?php
/**

* TIL INFORMASJON: 

* I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
* Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
* Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 
* Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
* Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

* Denne koden er hentet fra og tilpasset egen løsning fra denne Youtube kanalen, part 1-6
* https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ

* Medlemmer som har bidratt:  Andreas Knutsen og Anders Koo

**/

//-----------------------------------------------------------------------------------------------------
// Setter opp session og includes
//-----------------------------------------------------------------------------------------------------
session_start(); // Gjenopptar session
include('db-config.php'); // Inkluderer database tilkobling
include('includes/header.php'); // Inkluderer header.php
?>

<!DOCTYPE html>
<html>

    <body>

        <?php include('includes/navbar.php'); ?> <!-- Inkluderer navbar.php  -->

        <div class="content-dashboard">
            <div class="container">
                <div class="card shadow mb-4 mx-auto" style="width: 30rem;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> EDIT Subscription </h6>
                    </div>
                    <div class="card-body">

                    <?php

                    if(isset($_POST['edit_btn'])) { // Sjekker om edit_btn er deklarert og knapp har blitt aktivert
                        $id = $_POST['edit_id'];  // Legger id på abonnementet inn i en variabel
                        $query = "SELECT * FROM cards WHERE id='$id' "; // Setter opp en spørrevariabel som henter abonnement som samsvarer med id' til det abonnement du har klikket på
                        // Setter opp en variabel med en mysqli_query funksjon som gjennomfører oppretting av forbindelse og SQL-spørringen 
                        $query_run = mysqli_query($mysqli, $query); 
    

                        // ----------------------------------------------------------------------------------------------------
                        // Setter opp bootstrap struktur
                        // ----------------------------------------------------------------------------------------------------

                        foreach($query_run as $row) { // foreach er en funksjon som teller opp antall rader i abonnement tabellen
                        ?>

                        <form action="server.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>"> <!-- Henter abonnement id fra DB -->
                            <div class="form-group">
                                <label> Beskrivelse </label>          
                                                                                <!-- Henter beskrivelse fra DB -->
                                <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter Username"> 
                            </div>
                            <div class="form-group">
                                <label>Fra dato</label>                         <!-- Henter start dato fra DB -->
                                <input type="date" name="edit_date_from" value="<?php echo $row['start_date'] ?>" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Til dato</label>                         <!-- Henter slutt dato fra DB -->
                                <input type="date" name="edit_date_to" value="<?php echo $row['end_date'] ?>" class="form-control" placeholder="Enter Password">
                            </div> 
                            <a href="dashboard.php" class="btn btn-primary"> Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                    <?php
                    }
                }
            ?>

                </div>
            </div>
        </div>
<!-- --------------------------------------------------------------------------------------------------
Footer 
------------------------------------------------------------------------------------------------------>

<?php include('includes/footer.php');?> <!-- Inkluderer footer.php -->

<!-- --------------------------------------------------------------------------------------------------
Footer 
------------------------------------------------------------------------------------------------------>

    </body>

<!-- ---------------------------------------------------------------------------------------------------- 
Henter script filer (JS, JQUERY, BOOTSTRAP)
----------------------------------------------------------------------------------------------------- -->
<?php include('includes/scripts.php');?>
<!-- ---------------------------------------------------------------------------------------------------- 
Henter script filer (JS, JQUERY, BOOTSTRAP)
----------------------------------------------------------------------------------------------------- -->
<html>