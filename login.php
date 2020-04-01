<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">    
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Logg inn</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form class="form-signin" action="server.php" method="POST" name="form1">
        <h1>LOGO</h1>
            <input type="text" placeholder="Enter your email..." name="email" class="">
            <input type="password" placeholder="Enter your password..." name="password" class="">
            <!-- /* https://getbootstrap.com/docs/4.0/components/buttons/#button-tags */ -->
            <input type="submit" id="login" name="loginbtn" class="btn primary" value="Logg inn">
    </form>
</body>
</html>




<?php

// ----------------------------------------------------------------------------------------------------
//   LOGINKNAPP
// ----------------------------------------------------------------------------------------------------

// Hvis formen er "submitted", hent email og passord fra formen
if (isset($_POST['loginbtn'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];




    // Sjekker om det eksisterer en bruker i databasen med gitt email
    $result->query("SELECT * FROM register WHERE email='$email'");

    if(mysqli_fetch_array($queryDB))
    {
        $_SESSION['username'] = $email_login;
        header("Location:dashboard.php");
    }
    else{
        $_SESSION['subError'] = 'Email id /Password Invalid';
        header('Location:login.php');
    }
    // ----------------------------------------------------------------------------------------------------
//  OPERASJON MED Å SAMMENLIGNE INPUT PASSORD MED HASHET PASSORD ER HENTET OG TILPASSET EGEN LØSNING FRA:
// https://www.youtube.com/playlist?list=PL-Db3tEF6pB_1oKlnpxyQGZIa8EYmA_1K
// https://www.youtube.com/watch?v=RCr0Go3Z0u8
// ----------------------------------------------------------------------------------------------------  
    
    // Variabel som lagrer bruker i db med fetch_array via MYSQLI_BOTH. MYSQLI_BOTH er en 
    // konstant metode som lager en tabell som både er numerisk og assosiati
    // https://stackoverflow.com/questions/34648767/what-is-difference-between-mysqli-fetch-array-and-mysqli-both/34649011
    $row = $result->fetch_array(MYSQLI_BOTH);
      // $user_matched = mysqli_num_rows($result);
      

    if(password_verify($password, $row['password'])){

        $_SESSION["id"] = $row['id'];
        header('Location: dashboard.php');
    }else {
        $_SESSION["LogInFail"] = "Yes;";
        header('Location: dashboard.php');
    }
}

?>