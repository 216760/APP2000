<?php

// ----------------------------------------------------------------------------------------------------
// NB! DENNE KODEN ER HENTET FRA YOUTUBE KANALEN FUNDA OF WEB IT OG TILPASSET EGEN LØSNING
// MODIFISERT AV: Anders Koo
// ----------------------------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------------------------
//  OPPRETTER UNIK SESSION FOR BRUKER
// ----------------------------------------------------------------------------------------------------

session_start();

// ----------------------------------------------------------------------------------------------------
//  SETTER OPP FORBINDELSE MED DATABASEN
// ----------------------------------------------------------------------------------------------------

$connection = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");


if(isset($_POST['registerbtn']))
{
    // INFORMASJON OM ABONNEMENT 
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

// ----------------------------------------------------------------------------------------------------
//  SETTER OPP SPØRREVARIABEL FOR REGISTRING AV ABONNEMENT
// ----------------------------------------------------------------------------------------------------

$queryReg = "INSERT INTO cards (description, start_date, end_date) VALUES ('$description', '$start_date','$end_date')";
$queryDB = mysqli_query($connection, $queryReg);



    if($queryDB)
    {
        echo "Saved";
        $_SESSION['subOk'] = "New subscription is successfully added!";
        header('Location: dashboard.php');
    
    }
    } else 
    {
        echo "Not Saved";
        $_SESSION['subError'] = "Subscription could not be added!";
        header('Location: dashboard.php');
    }



// ----------------------------------------------------------------------------------------------------
// REDIGERINGSKNAPP
// ----------------------------------------------------------------------------------------------------

    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
        
        $queryReg = "SELECT * FROM cards WHERE id='$id' ";
        $queryDB = mysqli_query($connection, $query);
    }

// ----------------------------------------------------------------------------------------------------
// OPPDATERINGSKNAPP
// ----------------------------------------------------------------------------------------------------
if(isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $description = $_POST['edit_description'];
    $start_date = $_POST['edit_date_from'];
    $end_date = $_POST['edit_date_to'];

    $queryEdit = "UPDATE cards SET description='$description', start_date='$start_date', end_date='$end_date' WHERE id='$id' ";
    $queryDB = mysqli_query($connection, $queryEdit);

    if($queryDB) {

    $_SESSION['subOk'] = "New subscription is successfully updated!";
    header('Location: dashboard.php');

    } else {
    $_SESSION['subError'] = "Subscription could not be updated";
    header('Location: dashboard.php');
    }
}


// ----------------------------------------------------------------------------------------------------
//   SLETTEKNAPP
// ----------------------------------------------------------------------------------------------------
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];


    $queryDelete = "DELETE FROM cards WHERE id='$id'";
    $queryDB = mysqli_query($connection, $queryDelete);

    if($queryDB)
    {
        $_SESSION['subOk'] = "Subscription is successfully deleted!";
        header('Location: dashboard.php');
    }
    else
    {
        $_SESSION['subError'] = "Subscription could NOT be deleted";
        header('Location: dashboard.php');
    }
}

// ----------------------------------------------------------------------------------------------------
//  
// ----------------------------------------------------------------------------------------------------



?>