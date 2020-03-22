<?php

/**
 * Name: Simple PHP Login & Registration Script
 * Tutorial: https://tutorialsclass.com/code/simple-php-login-registration-script
 * 
 * 
 * https://www.youtube.com/watch?v=RCr0Go3Z0u8
 * https://stackoverflow.com/questions/34648767/what-is-difference-between-mysqli-fetch-array-and-mysqli-both/34648854
 * https://stackoverflow.com/questions/42050614/mysqli-queryconn-sql-or-conn-querysql
 * https://www.php.net/manual/en/mysqli-result.fetch-array.php
 * https://www.w3schools.com/php/func_mysqli_query.asp
 * https://www.w3schools.com/php/func_mysqli_fetch_array.asp
 * 
 */

// ----------------------------------------------------------------------------------------------------
//  KODEN ER HENTET OG TILPASSET EGEN LØSNING FRA: 
//  https://tutorialsclass.com/code/simple-php-login-registration-script
// ----------------------------------------------------------------------------------------------------

// Starter PHP session
// session_start();
// Oppretter forbindelse med databasen med connection-fil
// include_once("db-config.php");
    // Sjekk om brukeren matcher/eksisterer, og lagrer bruker-email i session og redirect til sample page-1
        // if ($user_matched > 0) {

    //         $_SESSION["email"] = $email;
    //         $data = $result->mysqli_fetch_array();
    //             if (password_verify($password, $data['password'])) {
    //             header("location: dashboard.php");
    //         echo "You have been logged IN!";
    //     } else
    //         echo "Please check your inputs!";
    // } else
            // echo"Please check your inputs!";

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

		<link rel="stylesheet" href="CSS/stylesheet.css">
		<link rel="stylesheet" href="CSS/Logginn.css">
</head>
<title>Logg inn</title>

<link rel="stylesheet" href="CSS/stylesheet.css">
<link rel="stylesheet" href="CSS/Logginn.css">
</head>

<body>
<form action="server.php" method="POST" name="form1">
<div class="content">
<h1>LOGO</h1>

<input type="text" placeholder="email" name="email" class=""><br>
<br>
<input type="password" placeholder="password" name="password" class=""><br>
<br>
<!-- /* https://getbootstrap.com/docs/4.0/components/buttons/#button-tags */ -->
<input type="submit" id="login" name="loginbtn" class="btn primary" value="Logg inn">
</div>
</form>
</body>

</html>

