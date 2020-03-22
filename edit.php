<?php
session_start();
include('includes/header.php');
include('includes/navbar.php'); 
?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/stylesheet.css">
<link rel="stylesheet" href="css/Logginn.css">

<!-- ---------------------------------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------------------------------------- -->


<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4 mx-auto" style="width: 30rem;">
	  <div class="card-header py-3">
	    <h6 class="m-0 font-weight-bold text-primary"> EDIT Subscription </h6>
	  </div>
	  <div class="card-body">

<?php


$connection = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");

// ----------------------------------------------------------------------------------------------------
// DATABASE FORBIINDELSE
// ----------------------------------------------------------------------------------------------------
    
    
    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM cards WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
    

// ----------------------------------------------------------------------------------------------------
// PRESENTERER DB DATA I BOOTSTRAP
// ----------------------------------------------------------------------------------------------------
        foreach($query_run as $row)
        {
            ?>
    
            <form action="server.php" method="POST">
    
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                    <label> Beskrivelse </label>          
                                                              <!-- loading username from db -->
                    <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter Username"> 
                </div>
                <div class="form-group">
                    <label>Fra dato</label>
                                                         <!-- loading email from db -->
                    <input type="date" name="edit_date_from" value="<?php echo $row['start_date'] ?>" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Til dato</label>
                                                                <!-- loading password from db -->
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



<!-- Script Source Files -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!-- End of Script Source Files -->

<!-- /.container-fluid -->

