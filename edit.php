<?php
/**************************************************************************************************************                                                                                                      
*                                                                                                             *
* TIL INFORMASJON:                                                                                            *
*                                                                                                             *
* I denne filen ligger det kode som er hentet og tilpasset egen løsning fra kildene nedenfor.                 *
* Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden.           *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                     *
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer. 	          *
*                                                                                                             * 
* Kilder:                                                                                                     * 
* https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ                                    * 
* https://drive.google.com/file/d/1Xz-ei5uWr-ZgBzBdHBUt0-0R3z3WsOW0/view                                      * 
* https://drive.google.com/file/d/1WM7zpPmlS7JFFfdn6PfsdxlT2iS5zOSF/view                                      * 
* https://www.youtube.com/watch?v=cgvDMUrQ3vA	                                                              *  
*                                                                                                             * 
* Vi har med vilje laget informasjons boksene i koden med ulike størrelser 									  * 
* for å kunne skille dem fra hverandre.                                                                       *
*                                                                                                             *
* Medlemmer som har bidratt:  Andreas Knutsen og Anders Koo                                                   *
*                                                                                                             *
**************************************************************************************************************/

//-----------------------------------------------------------------------------------------------------------------
// Setter opp session og includes
//-----------------------------------------------------------------------------------------------------------------

session_start();                // Gjenopptar session
include('db-config.php');       // Inkluderer database tilkobling
include('lang-config.php');     // Inkluderer oppsett for flere språk
include('includes/header.php'); // Inkluderer header.php

if(!isset($_SESSION['id'])){    // Hvis session ikke er satt blir brukeren videresendt til login.php
    header('Location:login.php'); 
}
?>

<!-- --------------------------------------------------------------------------------------------------------------------------- -->
<!-- START                                                                                                                       -->
<!-- For å redigere allerede opprettet abonnement har vi hentet å tilpasset kode fra Youtube kanalen Funda Of Web IT, part 1-6   -->
<!-- Kilde: https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ                                             -->
<!--                                                                                                                             -->
<!-- Kildekode for Admin Panel PHP:                                                                                              -->
<!-- https://drive.google.com/file/d/1Xz-ei5uWr-ZgBzBdHBUt0-0R3z3WsOW0/view	                                                     -->
<!-- --------------------------------------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

    <body>

        <?php include('includes/navbar.php'); ?> <!-- Inkluderer navbar.php  -->

        <div class="content-dashboard">
            <div class="container">
                <div class="card shadow mb-4 mx-auto" style="width: 30rem;">
                    <div class="card-header py-3">
                                            <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
                        <h6 class="modal-title"><?php echo $lang_text['edit-subscription']; ?></h6>
                    </div>
                    <div class="card-body">

                    <?php

                    // ----------------------------------------------------------------------------------------------------
                    // Redigeringsknapp START
                    // ----------------------------------------------------------------------------------------------------
                    // Medlemmer som har bidratt: Anders Koo                                                                        

                    if(isset($_POST['edit_btn'])) { // Sjekker om edit_btn er deklarert og knapp har blitt aktivert
                        $id = $_POST['edit_id'];  // Henter ut id med $_POST
                        $queryEdit = "SELECT * FROM cards WHERE id='$id' "; // Setter opp en spørrevariabel som henter abonnement som samsvarer med id' til det abonnement du har klikket på
                        // Setter opp en variabel med en mysqli_query funksjon som gjennomfører oppretting av forbindelse og SQL-spørringen 
                        $queryDB = mysqli_query($mysqli, $queryEdit); 

                        foreach($queryDB as $row) { // foreach er en funksjon som teller opp antall rader i abonnement tabellen
                        
                    // ----------------------------------------------------------------------------------------------------
                    // Redigeringsknapp STOPP
                    // ----------------------------------------------------------------------------------------------------

                        ?>

                        <form action="server.php" id="my_form" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>"> <!-- Henter abonnement id fra DB -->
                            <div class="form-group">
                                        <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
                                <label> <?php echo $lang_text['card-title']; ?> </label>          
                                                                                  <!-- Henter beskrivelse fra DB -->
                                <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="<?php echo $lang_text['subscription-name']; ?>"> 
                            </div>
                            <div class="form-group">
                                       <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
                                <label><?php echo $lang_text['card-start-date']; ?></label>                         <!-- Henter start dato fra DB -->
                                <input type="date" name="edit_date_from" value="<?php echo $row['start_date'] ?>" class="form-control" placeholder="Start date">
                            </div>
                            <div class="form-group">
                                       <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
                                <label><?php echo $lang_text['card-end-date']; ?></label>
                                                                    <!-- Henter slutt dato fra DB -->
                                                                              <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->                     
                                <input type="date" name="edit_date_to" value="<?php echo $row['end_date'] ?>" class="form-control" placeholder="End date">
                            </div>
                                                                            <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] --> 
                            <a href="dashboard.php" class="btn btn-primary"><?php echo $lang_button['cancelbtn']; ?></a>
                                                                             <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
                            <button name="updatebtn" class="btn btn-primary"><?php echo $lang_button['updatebtn']; ?></button>
                        </form>
                    </div>

                    <?php
                    }
                }
            ?>

                </div>
            </div>
        </div>

<!-- --------------------------------------------------------------------------------------------------------------------------- -->
<!-- STOPP                                                                                                                       -->
<!-- For å redigere allerede opprettet abonnement har vi hentet å tilpasset kode fra Youtube kanalen Funda Of Web IT, part 1-6   -->
<!-- Kilde: https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ                                             -->
<!--                                                                                                                             -->
<!-- Kildekode for Admin Panel PHP:                                                                                              -->
<!-- https://drive.google.com/file/d/1Xz-ei5uWr-ZgBzBdHBUt0-0R3z3WsOW0/view	                                                     -->
<!-- --------------------------------------------------------------------------------------------------------------------------- -->

<!-- --------------------------------------------------------------------------------------------------
Footer START
------------------------------------------------------------------------------------------------------>

<?php include('includes/footer.php');?> <!-- Inkluderer footer.php -->

<!-- --------------------------------------------------------------------------------------------------
Footer STOPP
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