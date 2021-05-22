<?php

/**************************************************************************************************************************************
* TIL INFORMASJON:                                                                                                                    *
*                                                                                                                                     *
* I denne filen ligger det kode vi har bygget videre på fra Tutorials Class: PHP Simple Login and Registration Script og tilpasset    *
* egen løsning fra kildene nedenfor. Regex uttrykket for passord validering er gjenbrukt.                                             *
* Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden                                    *
* Grunnen til dette er basert på “best practice”  måter å programmere på.                                                             *  
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer. 	                                  *
*                                                                                                                                     *
* Kilder:                                                                                                                             * 
* https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s                                                                                  * 
* https://gitlab.com/tutorialsclass/php-simple-login-registration-script                                                              * 
* https://www.imtiazepu.com/password-validation                                                                                       * 
* https://drive.google.com/file/d/1WM7zpPmlS7JFFfdn6PfsdxlT2iS5zOSF/view                                                              * 
* https://www.youtube.com/watch?v=cgvDMUrQ3vA                                                                                         *
*                                                                                                                                     * 
* Vi har med vilje laget informasjons boksene i koden med ulike størrelser 									                          * 
* for å kunne skille dem fra hverandre.                                                                                               * 
*                                                                                                                                     *                                                                                                                     *
* Medlemmer som har bidratt:  Henrik Solnør Johansen, Andreas Knutsen og Anders Koo                                                   *         
*                                                                                                                                     *
**************************************************************************************************************************************/

include('lang-config.php'); // Inkluderer oppsett for flere språk
ob_start();                 // Skrur på output buffering (forhindrer header warning)
?>

<!DOCTYPE html>
<html lang="en">

    <?php
    include('includes/header_signup.php'); // Inkluderer header_singup.php
    ?>

    
    
    <!-- -------------------------------------------------------------------- -->
	<!-- Oppsett av registring for ny bruker START                            -->
	<!-- -------------------------------------------------------------------- -->
    <body>
             
        <form id="myForm" class="form-signin" form action="signup.php" method="post" name="form1">
        <h1 class="logo_title">re:sub</h1>
        <img class="image_signup" src="other/logo/logoSmall.png" alt="">
                                            <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
            <input type="text" placeholder="<?php echo $lang_input['input-username']; ?>" class="" name="name">
                                            <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
            <input type="text" placeholder="<?php echo $lang_input['input-email']; ?>" class="" name="email">
                                                <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
            <input type="password" placeholder="<?php echo $lang_input['input-password']; ?>" class="" name="password"> 
            
    <!-- -------------------------------------------------------------------- -->
	<!-- Oppsett av registring for ny bruker STOPP                            -->
	<!-- -------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- START 																								  				  -->
<!-- For å sette opp muligheter for både norsk og engelsk opppset av vi hentet kode og tilpasset fra kilden under  		  -->																	 
<!-- Kilde: https://www.youtube.com/watch?v=cgvDMUrQ3vA											  				          -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->
                                                                                                   <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
            <button class="btn btn-primary w-100" id="regbtn" name="registerbtn"  value="Register"><?php echo $lang_button['registerbtn']; ?></button>
            
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- STOPP 																								  				  -->
<!-- For å sette opp muligheter for både norsk og engelsk opppset av vi hentet kode og tilpasset fra kilden under  		  -->																	 
<!-- Kilde: https://www.youtube.com/watch?v=cgvDMUrQ3vA											  				          -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->



<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- START 																								  				  -->
<!-- Setter opp tilbakemelding til bruker basert på session status												  		  -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->
            <?php

                if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
                    echo '<h6 class="bg-warning text-white"> '.$_SESSION['status'].' </h6>';
                    unset($_SESSION['status']);
                } else if (isset($_SESSION['success']) && $_SESSION['success'] !='') {
                    echo '<h6 class="bg-success text-white"> '.$_SESSION['success'].' </h6>';
                    unset($_SESSION['success']);
                }

            ?>

<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- STOPP 																								  				  -->
<!-- Setter opp tilbakemelding til bruker basert på session status												  		  -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->

        </form>

    </body>
    
    <!-- Inkluderer script.php -->
    <?php include('includes/scripts.php');?>

</html>


<!-- --------------------------------------------------------------------------------------------------------------- -->
<!-- START                                                                                                           -->
<!-- Denne koden er hentet fra og tilpasset egen løsning fra Youtube kanalen Coding Passive income.                  -->
<!-- Vi brukte denne kanalen for å forstå hvordan vi registrerte hashet passord fra bruker i registreringsskjema.    -->
<!-- Så lærte vi hvordan man kan sammenligne input passsord fra login skjema til å matche hashet passord i databasen.-->
<!-- Dette for å sjekke at korrekt bruker med korrekt password blir logget inn.                                      -->
<!-- Sentral krypterings algoritme: PASSWORD_BCRYPT                                                                  -->
<!-- Kilde: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s                                                       -->
<!-- ------------------------------------------------------------------------------------------------------------------>

<!-- Kodet og tilpasset av: Anders Koo og Andreas Knutsen START -->

<?php

    include("db-config.php"); // Inkluderer db-config.php

    // Sjekker om registreringsformen er klar, og legger inn data i databasen
    if (isset($_POST['registerbtn'])) {
        $name     = mysqli_real_escape_string($mysqli, $_POST['name']);
        $email    = mysqli_real_escape_string($mysqli, $_POST['email']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        // Dette regex uttrykket er gjenbrukt hentet fra https://www.imtiazepu.com/password-validation/
        $regex =  "#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";

        $empty = FALSE;
        
        if(!empty($_POST['name'] && $_POST['email'] && $_POST['password'])) {

            // mysqli_query er er spørremetode som tar inn databaseforbindelse variabelen mysqli og selve SQL spørringen.
            $email_result = mysqli_query($mysqli, "select 'email' from register where email='$email' and password='$password'");

            // mysqli_num_rows teller antall rader som matcher med email som bruker skrev i registreringsskjema
            $user_matched = mysqli_num_rows($email_result);


            // Bruker filter_var som er en metode som tar inn en variabel og et filter FILTER_SANITIZE_EMAIL
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);


            // Om emailen ikke er i riktig regex format blir den ikke sanitert
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['status'] = "$email is not a valid email address!";
                header('Location: signup.php');

               
            //----------------------------------------------------------------------------------------------- //
            // START                                                                                          //
            // Denne koden er hentet og tilpasset egen løsning fra                                            //  
            // Kilde: https://www.imtiazepu.com/password-validation/                                          // 
            //----------------------------------------------------------------------------------------------- //
            }if(!preg_match($regex,$password)){
                    $_SESSION['status'] = "The password must be at least 8 characters and must contain at least one capital letter, one number and one special character.";
                    header('Location: signup.php');

            //----------------------------------------------------------------------------------------------- //
            // STOPP                                                                                          //
            // Denne koden er hentet og tilpasset egen løsning fra                                            //
            // Kilde: https://www.imtiazepu.com/password-validation/                                          //
            //----------------------------------------------------------------------------------------------- //
            } else {
                
                // Variabel som bruker password_hash funksjon sammen med PASSWORD_BCRYPT algoritme for å hashe passord
                $hashedpass = password_hash($password, PASSWORD_BCRYPT); 


                
                // Setter brukerdata inn i databasen ved funksjon mysqli_query
                $result = mysqli_query($mysqli, "INSERT INTO register(username,email,password) VALUES('$name','$email','$hashedpass')");
                    // Ved gjennomført spørring får brukeren beskjed om at profilen er opprettet 
                    if ($result) {
                        $_SESSION['success'] = "$name registered successfully!";
                        header('Location: login.php');
                    } else {
                        //  Ved gjennomført spørring får brukeren beskjed om at emailen allerede er i bruk
                        $_SESSION['status'] = "Email already in use: \n" . mysqli_error($mysqli);

                    }
            }
//--------------------------------------------------------------------------------------------------------------------//
// STOPP                                                                                                              //
// Denne koden er hentet fra og tilpasset egen løsning fra Youtube kanalen Coding Passive income.                     //
// Vi brukte denne for å forstå hvordan vi registrerte hashet passord fra bruker i registreringsskjema.               //
// Så lærte vi hvordan man kan sammenligne input password fra login skjema til å matche hashet passord i databasen.   //
// Dette for å sjekke at riktig bruker med riktig password ble logget inn.                                            //
// Sentral krypterings algoritme: PASSWORD_BCRYPT                                                                     //
// Kilde: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s                                                          //
//--------------------------------------------------------------------------------------------------------------------//


        } else {

            //Ved tomme felt får brukeren beskjed om at feltene IKKE kan være tomme
            $_SESSION['status'] = "Fields cannot be empty!";
            header('Location: signup.php'); // Header er en funksjon som viderefører brukeren til signup
        }
    }

//-- Kodet og tilpasset av: Anders Koo og Andreas Knutsen STOPP --
ob_end_flush(); // // Skrur av output buffering (forhindrer header warning)

?>
