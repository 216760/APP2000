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
<?php session_start(); ?> <!-- Oppretter unik sessjon til bruker -->

<!DOCTYPE html>
<html>
<!-- Inkluderer bare 'db-config.php' en gang, og scriptet vil avbrytes dersom include_once-funksjonen ikke finner filen. -->
    <?php include('includes/header_login.php');?>
 
 <body id="custom-body">
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

    <?php include('includes/scripts.php');?> <!-- Inkluderer scripts.php -->

</html>


<?php

include_once('db-config.php'); // Inkluderer bare 'db-config.php' en gang, og scriptet vil avbrytes dersom include_once-funksjonen ikke finner filen.

    if (isset($_POST['loginbtn'])) { //Sjekker at variabel er deklarert og at knappen er klikket på
        $email    = mysqli_real_escape_string($mysqli, $_POST['email']);    //Sjekker at email er deklarert og sikrer mot sql injection
        $password = mysqli_real_escape_string($mysqli, $_POST['password']); //Sjekker at password er deklarert og sikrer mot sql injection

//-----------------------------------------------------------------------------------------------------
// Denne koden er hentet fra og implementert og tilpasset inn i egen løsning fra Youtube kanalen Coding Passive income
// Kilde: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s
//-----------------------------------------------------------------------------------------------------

//Kodet og tilpasset av: Anders Koo og Andeas Knutsen START 

        // mysqli_query funksjon som utfører SELECT spørring mot database og sjekker om email matcher med input
        $sql = mysqli_query($mysqli, "SELECT id, password FROM register WHERE email='$email'"); 
        $user_matced = mysqli_num_rows($sql); // mysqli_num_rows funksjon som enter ut raden som matcher med email og legger denne i en variabel
        if ($user_matced > 0) { // Hvis user_matced returerner en verdi større en 0 fortsetter koden.
            $data = mysqli_fetch_array($sql); // Legger SELECT spørringen i tabell ved hjelp av funksjonen mysqli_fetch_array. Deretter legges denne spørringen i en variabel
            $id = $data['id'];  // Henter ut bruker id fra databasen og legger den i en variabel
            $_SESSION['id'] = $id;  // Legger id variabelen inn i en session variabel. Dette for å identifisere bruker
        
        //password_verify er en funksjon som sammenligner input password med hashet passord i databasen fra $data variabel
        if(password_verify($password, $data['password'])) { 
            header('Location:dashboard.php'); // Header er en funksjon som viderefører brukeren til dashboard
            exit(0); // exit er en funksjon som terminerer operasjonen 
        } else
            header('Location: login.php');  // Header er en funksjon som viderefører brukeren til login
            $_SESSION['status'] = "Email or password is incorrect"; //Feilmelding til bruker
            exit(0); // exit er en funksjon som terminerer operasjonen 
        } else {
            header('Location:login.php'); // Header er en funksjon som viderefører brukeren til login
            $_SESSION['status'] = "Fields cannot be empty"; //Feilmelding til bruke
            exit(0); // exit er en funksjon som terminerer operasjonen 
        }
    }
//Kodet og tilpasset av: Anders Koo og Andeas Knutsen STOPP 

?>
