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

$con = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");
if (isset($_POST['loginbtn'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Check if a user exists with given username & password
    //Sjekker om bruker med brukernavn og passord allerede eksisterer

    $sql = $con->query("SELECT id, password FROM register WHERE email='$email'");
    if ($sql->num_rows > 0) {
        $data = $sql->fetch_array(); 
    if(password_verify($password, $data['password'])) {
        echo "You have been logged in";
        header('Location: dashboard.php');
    } else 
        echo "User email or password is not matched <br/><br/>";
    } else {
        echo "Please check your inputs!";
    }
}

?>
