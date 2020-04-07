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
include('db-config.php');
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
    
    <title>Logg inn</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form class="form-signin text-center" action="login.php" method="POST" name="form1">
        <h1>LOGO</h1>
            <input type="text" placeholder="Enter your email..." name="email" class="">
            <input type="password" placeholder="Enter your password..." name="password" class="">
            <!-- /* https://getbootstrap.com/docs/4.0/components/buttons/#button-tags */ -->
            <input type="submit" id="login" name="loginbtn" class="btn primary" value="Login">
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


<?php
ob_start(); // Aktiverer output buffering

    if (isset($_POST['loginbtn'])) {                                        //Sjekker at variabel er deklarert og sikrer mot sql injection
        $email    = mysqli_real_escape_string($mysqli, $_POST['email']);    //Sjekker at email er deklarert og sikrer mot sql injection
        $password = mysqli_real_escape_string($mysqli, $_POST['password']); //Sjekker at password er deklarert og sikrer mot sql injection

//-----------------------------------------------------------------------------------------------------
// Denne koden er hentet fra og implementert og tilpasset inn i egen løsning fra Youtube kanalen Coding Passive income
// Kilde: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s
//-----------------------------------------------------------------------------------------------------

//Kodet og tilpasset av: Anders Koo og Andeas Knutsen START 

        $sql = mysqli_query($mysqli, "SELECT id, password FROM register WHERE email='$email'"); // Utfører SELECT spørring mot database og sjekker om email matcher med input
        $user_matced = mysqli_num_rows($sql); // Henter ut raden som matcher med email og legger denne i en variabel
        if ($user_matced > 0) {
            $data = mysqli_fetch_array($sql); // Legger SELECT spørringen i tabell deretter i en variabel
            $id = $data['id'];
            $_SESSION['id'] = $id;
            
        if(password_verify($password, $data['password'])) { //password_verify sammenligner input password med hashet passord i databasen fra $data variabel
            header('Location:dashboard.php'); // Header er en funksjon som viderefører brukeren til dashboard
            exit(0); // Funksjon som terminerer operasjonen 
        } else
            header('Location: login.php');  // Header er en funksjon som viderefører brukeren til login
            $_SESSION['status'] = "Email or password is incorrect"; //Feilmelding til bruker
            exit(0); // Funksjon som terminerer operasjonen 
        } else {
            header('Location:login.php'); // Header er en funksjon som viderefører brukeren til login
            $_SESSION['status'] = "Fields cannot be empty"; //Feilmelding til bruke
            exit(0); // Funksjon som terminerer operasjonen 
        }
    }
//Kodet og tilpasset av: Anders Koo og Andeas Knutsen STOPP 

ob_end_flush(); //  Flush (send) output-bufferen og deaktiver output-buffering
?>
