<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include_once('db-config.php');


// Oppretter forbindelse til databasen
$connection = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");
?>

<!-- ----------------------------------------------------------------------------------------------------
Setter opp session og includes
----------------------------------------------------------------------------------------------------- -->


<div class="content-dashboard">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card shadow mb-4 mx-auto" style="width: 30rem;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-center">New subscription</h6>
                    </div>
                    <div class="card-body">
                        <form class="form-signin" action="server.php" method="POST">
                            <input type="hidden" name="edit_id" value="">
                            <div class="form-group">
                                <label> Beskrivelse </label>          
                                <input type="text" name="description" value="" class="form-control" placeholder="Enter Username"> 
                            </div>
                            <div class="form-group">
                                <label>Fra dato</label>              
                                <input type="date" name="start_date" value="" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Til dato</label>                 
                                <input type="date" name="end_date" value="" class="form-control" placeholder="">
                            </div> 
                            <a href="dashboard.php" class="btn btn-primary"> Cancel</a>
                            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
include('includes/footer.php');
include('includes/scripts.php');
?>