<!----------------------------------------------------------------------------------------------------------------------------------------------

TIL INFORMASJON: 

I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

Linker til gjenbrukt kode:

Vi har primært tilpasset kode fra part 1-6 i fra denne Youtube kanalen. Her det blir forklart hvordan man 
henter ut data fra database og lastet inn i html malen: 
https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ

https://www.w3schools.com/howto/howto_css_fixed_footer.asp 
https://stackoverflow.com/questions/36003670/how-to-put-a-link-on-a-button-with-bootstrap 
https://stackoverflow.com/questions/36108407/how-to-auto-adjust-the-height-of-fixed-footer-at-bottom


------------------------------------------------------------------------------------------------------------------------------------------------>



<?php
// ----------------------------------------------------------------------------------------------------
// Setter opp session og includes
// ----------------------------------------------------------------------------------------------------

session_start();
include('includes/header.php');
include('includes/navbar.php');

// ----------------------------------------------------------------------------------------------------
// Setter opp session og includes
// ----------------------------------------------------------------------------------------------------

?>



<?php
// ----------------------------------------------------------------------------------------------------
// Setter opp database forbindelse med spørrring
// ----------------------------------------------------------------------------------------------------

// $connection = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");
$connection = mysqli_connect("localhost", "root", "", "gruppe2");
$query = "SELECT * FROM cards";
$query_run = mysqli_query($connection, $query);


// ----------------------------------------------------------------------------------------------------
// 
// ----------------------------------------------------------------------------------------------------
?>


<!-- ---------------------------------------------------------------------------------------------------- 
 Setter opp dashboard struktur. Vi henter så ut brukerkort fra databasen ved å identifisere dem via id 
----------------------------------------------------------------------------------------------------- -->

<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<h6 class="info-text">Please add new subscription in the top right</h6>
                    <div class="container">
                        <div class="row">
                        <?php
                            //Hvis det finnes rader/data i db
                            if(mysqli_num_rows($query_run) > 0)
                            {
                            //og spørring returnerer data, blir dataene presenter i en tabell 
                            while($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <!-- Tabellen blir vist frem ved hjelp av DOM elementer -->
                                        <div class="col-sm-4">
                                            <div class="card shadow mx-auto" style="width: 18rem;">
                                            <ul class="list-group list-group-flush">  
                                                <h5 class="list-group-item">Service <?php echo $row['description']; ?></h5>    
                                                <p class="list-group-item">Start date <?php echo $row['start_date']; ?></p>
                                                <p class=list-group-item>End date <?php echo $row['end_date']; ?></p>
                                                </ul>
                                                <div class="card-body">
                                                <form action="edit.php" method="POST">                <!-- Henter ut id fra DB -->
                                                    <input type="hidden" name ="edit_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="edit_btn" class="btn btn-primary"> Edit</button>
                                                </form> 
                                                <form action="server.php" method="POST">                <!-- Henter ut id fra DB -->
                                                    <input type="hidden" name ="delete_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="delete_btn" class="btn btn-primary"> Delete</button>
                                                    </form>                             
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <?php
                        }
                        else {
                        echo '<h7 class="empty-sub">No subscriptions yet :(</h7>';
                        }
                    ?>
                    <div class="container">
                        <div class="modal" id="eexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title" id="addServiceLabel">Add service</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form action="server.php" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                    <label> Service </label>
                                                    <input type="text" name="description" value=""  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                    <label>Trial from</label>
                                                    <input type="date" name="start_date" value=""  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                    <label>Trial to</label>
                                                        <input type="date" name="end_date" value="" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                                            <button type="submit" name="registerbtn" class="btn">Save</button>
                                            </div>

                                            <?php

                                            if(isset($_SESSION['subOk']) && $_SESSION['subOk'] != '')
                                            {
                                            echo '<h2> ' .$_SESSION['subOk']. ' </h2>';
                                            unset($_SESSION['subOk']);
                                            }

                                            if(isset($_SESSION['subError']) && $_SESSION['subError'] != '')
                                            {
                                            //   echo '<h2 class="bg-info"> ' .$_SESSION['subError']. ' </h2>';
                                            unset($_SESSION['subError']);
                                            }
                                            ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                  

<!-- ---------------------------------------------------------------------------------------------------- 

----------------------------------------------------------------------------------------------------- -->






<!-- ---------------------------------------------------------------------------------------------------- 
Footer
----------------------------------------------------------------------------------------------------- -->

<?php include('includes/footer.php');?>

<!-- ---------------------------------------------------------------------------------------------------- 
Footer
----------------------------------------------------------------------------------------------------- -->

</body> 
</html>
