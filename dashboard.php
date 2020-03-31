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
$connection = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");
$query = "SELECT * FROM cards";
$query_run = mysqli_query($connection, $query);


// ----------------------------------------------------------------------------------------------------
// 
// ----------------------------------------------------------------------------------------------------
?>


<!-- ---------------------------------------------------------------------------------------------------- 
 Setter opp dashboard struktur. Vi henter så ut brukerkort fra databasen ved å identifisere dem via id 
----------------------------------------------------------------------------------------------------- -->

<div class="content-dashboard">
  <div class="container">
    <div class="row justify-content-center">
        <?php

        if(mysqli_num_rows($query_run) > 0) {

          while($row = mysqli_fetch_assoc($query_run)) {

        ?>
      <div class="col-sm-4">
        <div class="card shadow mx-auto" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><h6 class="card-text">Service</h6><?php echo $row['description']; ?></li>
            <li class="list-group-item"><h6 class="card-text">Start date</h6><?php echo $row['start_date']; ?></li>
            <li class="list-group-item"><h6 class="card-text">End date</h6><?php echo $row['end_date']; ?></li>
          </ul>
          <div class="card-body">
              <form action="edit.php" method="POST">                                               <!-- holds id value -->
                  <input type="hidden" name ="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-primary"> Edit</button>
                    </form>    
              <form action="server.php" method="POST"> 
                  <input type="hidden" name ="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-primary"> Delete</button>
                  </form>                            
          </div>
        </div>
      </div>
          <?php } ?>
    </div>
  </div>
</div>

  <?php
    }
    else { ?>
      <h6 class="info-text">Please add new subscription in the top right</h6> <?php
    }
  ?>
<div class="container">
  <div class="modal" id="eexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="exampleModalLabel">Legg til abonnoment</h5> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
              
        <form action="server.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label> Tjeneste </label>
                <input type="text" name="description" value=""  class="form-control" >
            </div>
            <div class="form-group">
                <label>Dato fra</label>
                <input type="date" name="start_date" value=""  class="form-control" >
            </div>
            <div class="form-group">
                <label>Dato til</label>
                <input type="date" name="end_date" value="" class="form-control">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="registerbtn" class="dashbtn btn-success">Save</button>
            </div>

          <?php

          if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
            echo '<h2> ' .$_SESSION['success']. ' </h2>';
            unset($_SESSION['success']);
          }

          if(isset($_SESSION['error']) && $_SESSION['error'] != '') {
            echo '<h2 class="bg-info"> ' .$_SESSION['error']. ' </h2>';
            unset($_SESSION['error']);
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
<!-- ---------------------------------------------------------------------------------------------------- 
Henter script filer (JS, JQUERY, BOOTSTRAP)
----------------------------------------------------------------------------------------------------- -->

<?php include'includes/scripts.php';?>

<!-- ---------------------------------------------------------------------------------------------------- 
Henter script filer (JS, JQUERY, BOOTSTRAP)
----------------------------------------------------------------------------------------------------- -->