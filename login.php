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
    <form class="form-signin" action="login.php" method="POST" name="form1">
        <h1>LOGO</h1>
            <input type="text" placeholder="Enter your email..." name="email" class="">
            <input type="password" placeholder="Enter your password..." name="password" class="">
            <input type="submit" id="login" name="loginbtn" class="btn primary" value="Logg inn">
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
</html>

<?php

// ----------------------------------------------------------------------------------------------------
//   LOGINKNAPP
// ----------------------------------------------------------------------------------------------------

 ?>
<?php 

$con = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");
    if (isset($_POST['loginbtn'])) {
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);

    // Denne koden er hentet fra og implementert inn i egen løsning fra Youtube kanalen 
        $sql = $con->query("SELECT id, password FROM register WHERE email='$email'");
        if ($sql->num_rows > 0) {
            $data = $sql->fetch_array(); 

        if(password_verify($password, $data['password'])) {
            $_SESSION['success'] = "You have been logged in";
            // echo "You have been logged in";
            header('Location: dashboard.php');
        } else
            $_SESSION['status'] = "Email or password is incorrect";
            header('Location: login.php');
        } else {
            $_SESSION['status'] = "Fields cannot be empty";
            header('Location: login.php');
        }
    }
?>


<!-- $con = mysqli_connect("itfag.usn.no", "v20app2000u2", "pw2", "v20app2000db2");
    if (isset($_POST['loginbtn'])) {
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);

    // Denne koden er hentet fra og implementert inn i egen løsning fra Youtube kanalen 
        $sql = $con->query("SELECT id, password FROM register WHERE email='$email'");
        if ($sql->num_rows > 0) {
            $data = $sql->fetch_array(); 

        if(password_verify($password, $data['password'])) {
            $_SESSION['success'] = "You have been logged in";
            // echo "You have been logged in";
            header('Location: dashboard.php');
        } else
            $_SESSION['status'] = "Email or password is incorrect";
            header('Location: login.php');
        } else {
            $_SESSION['status'] = "Fields cannot be empty";
            header('Location: login.php');
        }
    } -->