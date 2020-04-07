<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>

             
        <form id="myForm" class="form-signin" form action="signup.php" method="post" name="form1">
            <h1>LOGO</h1>
            <input type="text" placeholder="username" class="" name="name">
            <input type="text" placeholder="email" class="" name="email">
            <input type="password" placeholder="password" class="" name="password"> 
            <input type="submit" id="regbtn" name="registerbtn" class="btn rounded primary" value="Registrer">
            <?php

                // Sjekker om session status er deklarert og ikke er en tom string
                if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
                    // Viser info melding til bruker
                    echo '<h6 class="bg-warning text-white"> '.$_SESSION['status'].' </h6>';
                    // Resetter SESSION status variaber
                    unset($_SESSION['status']);
                    // Sjekker om session status er deklarert og ikke er en tom string
                } else if (isset($_SESSION['success']) && $_SESSION['success'] !='') {
                    // Viser info melding til bruker
                    echo '<h6 class="bg-success text-white"> '.$_SESSION['success'].' </h6>';
                    // Resetter SESSION success variaber
                    unset($_SESSION['success']);
                }

            ?>

        </form>

</body>
</html>
    
<!----------------------------------------------------------------------------------------------------------------------------------------------
TIL INFORMASJON: 

I denne filen finnes det kode som er gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under. 
Dette er også synlig kommentert andre steder i filen der hvor dette oppstår, og vil også bli dokumentert under kildebruk i rapporten.
Grunnen til dette er fordi at for enkelte funksjoner så er det “best practice”-måter å kode på. For vår del så er det en måte å lære dette på. 
Vi setter oss inn i all koden først, og sørger for at vi forstår den, før den eventuelt vil bli tilpasset og implementert i vår kode.

Kilde: 
https://www.youtube.com/playlist?list=PLRheCL1cXHrvTkUenAc5GdEvqIpVX-2JJ

------------------------------------------------------------------------------------------------------------------------------------------------> 

        <?php
        //Inkluderer database connection-fil
        include("db-config.php");

        $empty = FALSE;

        // Sjekker om registreringsformen er klar, og legger inn data i databasen
        if (isset($_POST['registerbtn'])) {
            $name     = mysqli_real_escape_string($mysqli, $_POST['name']);
            $email    = mysqli_real_escape_string($mysqli, $_POST['email']);
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);

            // $password= password_hash($_POST["password"],PASSWORD_DEFAULT);
            $empty = FALSE;
            $emailErr = "";
            
            if(!empty($_POST['name'] && $_POST['email'] && $_POST['password'])) {

                // Hvis email allerede er registert får bruker en feilmelding
                $email_result = mysqli_query($mysqli, "select 'email' from register where email='$email' and password='$password'");

                // Teller antall rader som matcher med email som bruker skrev i registreringsformen
                $user_matched = mysqli_num_rows($email_result);

                // Gjør email sikker på SQL injekting (saniterer)
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);

                // Om emailen ikke er i riktig regex format blir den ikke sanitert
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $_SESSION['status'] = "$email is not a valid email address";
                    header('Location: signup.php');

                } else {


// ----------------------------------------------------------------------------------------------------
// Operasjon med å hashe brukerregistrert passord er hentet og tilpasset egen løsning fra: 
// Kilde: 
// https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s
// ----------------------------------------------------------------------------------------------------

                    // Variabel som bruker password_hash metode sammen med PASSWORD_BCRYPT algoritme for å hashe passord
                    $hashedpass = password_hash($password, PASSWORD_BCRYPT);
                    
                    // Setter brukerdata inn i databasen
                    $result = mysqli_query($mysqli, "INSERT INTO register(username,email,password) VALUES('$name','$email','$hashedpass')");
                        // Ved gjennomført spørring får brukeren beskjed om at profilen er opprettet 
                        if ($result) {
                            $_SESSION['success'] = "$User Registered successfully";
                            header('Location: signup.php');
                        } else {
                            //  Ved gjennomført spørring får brukeren beskjed om at emailen allerede er i bruk
                            $_SESSION['status'] = "Email already in use: \n" . mysqli_error($mysqli);

                        }
                }
            } else {
                //Ved tomme felt får brukeren beskjed om at feltene IKKE kan være tomme
                $_SESSION['status'] = "Fields cannot be empty";
                header('Location: signup.php');
            }
        }
    
?>
