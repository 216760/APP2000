<!----------------------------------------------------------------------------------------------------------------------------------------------

TIL INFORMASJON: 

I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

Denne koden er hentet fra og tilpasset egen løsning fra denne Youtube kanalen, part 1-6
https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ



------------------------------------------------------------------------------------------------------------------------------------------------> 



<!-- ----------------------------------------------------------------------------------------------------
Setter opp session og includes
----------------------------------------------------------------------------------------------------- -->

<?php
session_start();
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/scripts.php'); 
?>

<!-- ----------------------------------------------------------------------------------------------------
Setter opp session og includes
----------------------------------------------------------------------------------------------------- -->


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/stylesheet.css">
<link rel="stylesheet" href="css/Logginn.css">

<div class="container-fluid">
	<div class="card shadow mb-4 mx-auto" style="width: 30rem;">
	  <div class="card-header py-3">
	    <h6 class="m-0 font-weight-bold text-primary"> EDIT Subscription </h6>
	  </div>
	  <div class="card-body">
<?php

// ----------------------------------------------------------------------------------------------------
// Setter opp database forbindelse
// ----------------------------------------------------------------------------------------------------

$connection = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");


    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM cards WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
    

// ----------------------------------------------------------------------------------------------------
// Setter opp bootstrap struktur
// ----------------------------------------------------------------------------------------------------

        foreach($query_run as $row)
        {
            ?>
    
            <form action="server.php" method="POST">
    
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                    <label> Beskrivelse </label>          
                                                              <!-- Henter data fra DB -->
                    <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter Username"> 
                </div>
                <div class="form-group">
                    <label>Fra dato</label>                   <!-- Henter data fra DB -->
                    <input type="date" name="edit_date_from" value="<?php echo $row['start_date'] ?>" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Til dato</label>                   <!-- Henter data fra DB -->
                    <input type="date" name="edit_date_to" value="<?php echo $row['end_date'] ?>" class="form-control" placeholder="Enter Password">
                </div> 
                    <a href="dashboard.php" class="btn"> Cancel</a>
                    <button type="submit" name="updatebtn" class="btn">Update</button>
                </form>
            </div>
    
            <?php
        }
    }
    ?>




<!-- --------------------------------------------------------------------------------------------------
 Footer 
------------------------------------------------------------------------------------------------------>

<?php include('includes/footer.php');?>

<!-- --------------------------------------------------------------------------------------------------
 Footer 
------------------------------------------------------------------------------------------------------>
