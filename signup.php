<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>Registrering</title>

		<link rel="stylesheet" href="CSS/stylesheet.css">
		<link rel="stylesheet" href="CSS/Logginn.css">
	</head>
	<body>					
<form id="myForm" form action="signup.php" method="post" name="form1">
	<div class="content">
		<h1>LOGO</h1>

		<input type="text" placeholder="username" class="" name="name"><br>
		<br>
		<input type="text" placeholder="email" class="" name="email"><br>
		<br>
		<input type="password" placeholder="password" class="" name="password"> 
		<br>
		<input type="submit" id="regbtn" name="registerbtn" class="btn rounded primary" value="Registrer">

	</div>
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
        session_start();
        //Inkluderer database connection-fil
        include_once("db-config.php");


        $empty = FALSE;

        // Sjekker om registreringsformen er klar, og legger inn data i databasen
        if (isset($_POST['registerbtn'])) {
            $name     = $_POST['name'];
            $email    = $_POST['email'];
			$password = $_POST['password'];


			// $password= password_hash($_POST["password"],PASSWORD_DEFAULT);
            $empty = FALSE;
            $emailErr = "";

        	if(!empty($_POST['name'] && $_POST['email'] && $_POST['password'])) {

	            // Hvis email allerede er registert får bruker en feilmelding
	            $email_result = mysqli_query($mysqli, "select 'email' from register where email='$email' and password='$password'");

	            // Teller antall rader som matcher med email som bruker skrev i registreringsformen
	            $user_matched = mysqli_num_rows($email_result);

	            // Hvis spørringen returnerer et antall bruker-rader som er større enn 0, betyr det at emailen allerede eksisterer i databasen
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            		echo("$email is not a valid email address");

            	} else {

            		echo"";

            		if ($user_matched > 0) {

            			echo "<br/><br/><strong>Error: </strong> User already exists with the email id '$email'.";

            		} else {

// ----------------------------------------------------------------------------------------------------
// Operasjon med å hashe brukerregistrert passord er hentet og tilpasset egen løsning fra: 
// Kilde: 
// https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s
// ----------------------------------------------------------------------------------------------------


						$hashedpass = password_hash($password, PASSWORD_BCRYPT);
            			$result = mysqli_query($mysqli, "INSERT INTO register(username,email,password) VALUES('$name','$email','$hashedpass')");
	
            			if ($result) {

            				echo "<br/><br/>User Registered successfully.";

            			} else {

            				echo "Registration error. Please try again." . mysqli_error($mysqli);

            			}
            		}
            	}
            }
        }

        ?>


<!-- 
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value
        var confirmPassword = document.getElementById("confirmpass").value
        if(password != confirmPassword) {
            alert('Passwords do not match!');
            return false;
        }
        return true;
    }
</script> -->
<!-- 
<!DOCTYPE html>
<html>
