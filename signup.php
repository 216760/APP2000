<!-- ------------------------------------------------------------------------------------------------ 
TIL INFORMASJON:
 

// I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
// Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
// Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

// Vi ser først på en demo av hvordan et eksempel virker, koder oss gjennom guiden for å lære hva som skjer. 
// Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

// Kilder: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s

Medlemmer som har bidratt:  Henrik Solnør Johansen, Andreas Knutsen og Anders Koo



-----------------------------------------------------------------------------------------------------  -->

<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>

    <?php
    include('includes/header_signup.php');
    ?>

    <body id="custom-body">

             
        <form id="myForm" class="form-signin" form action="signup.php" method="post" name="form1">
            <h1>LOGO</h1>
            <input type="text" placeholder="username" class="" name="name">
            <input type="text" placeholder="email" class="" name="email">
            <input type="password" placeholder="password" class="" name="password"> 
            <input type="submit" id="regbtn" name="registerbtn" class="btn rounded primary" value="Registrer">
            <?php

                if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
                    echo '<h6 class="bg-warning text-white"> '.$_SESSION['status'].' </h6>';
                    unset($_SESSION['status']);
                } else if (isset($_SESSION['success']) && $_SESSION['success'] !='') {
                    echo '<h6 class="bg-success text-white"> '.$_SESSION['success'].' </h6>';
                    unset($_SESSION['success']);
                }

            ?>

        </form>

    </body>

    <?php
    include('includes/scripts.php');
    ?>

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


<!-- Kodet og tilpasset av: Anders Koo og Andreas Knutsen START -->

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

                // mysqli_query er er spørremetode som tar inn databaseforbindelse variabelen mysqli og selve SQL spørringen.
                $email_result = mysqli_query($mysqli, "select 'email' from register where email='$email' and password='$password'");

                // mysqli_num_rows teller antall rader som matcher med email som bruker skrev i registreringsskjema
                $user_matched = mysqli_num_rows($email_result);


                // Bruker filter_var som er en metode som tar inn en variabel og et filter FILTER_SANITIZE_EMAIL
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
                    
                    // Variabel som bruker password_hash funksjon sammen med PASSWORD_BCRYPT algoritme for å hashe passord
                    $hashedpass = password_hash($password, PASSWORD_BCRYPT); 
                    
                    // Setter brukerdata inn i databasen ved funksjon mysqli_query
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
                header('Location: signup.php'); // Header er en funksjon som viderefører brukeren til signup
            }
        }

        //-- Kodet og tilpasset av: Anders Koo og Andreas Knutsen STOPP --
ob_end_flush();
?>
