<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

//Setter opp forbindelse til database. 
$url = 'itfag.usn.no';
$username = 'v20app2000u2'; //v20app2000u2
$password = 'pw2';
$db = "v20app2000db2";
$mysqli = mysqli_connect($url, $username, $password, $db); //v20app2000db2
if(!$mysqli){ //Hvis man ikke får koplet til så får man en feilmelding
 die('Could not Connect My Sql:' .mysqli_error());

}


// https://www.w3schools.com/php/php_mysql_prepared_statements.asp
// https://www.php.net/manual/en/mysqli.prepare.php
// https://www.php.net/manual/en/mysqli-stmt.bind-param.php

//--------------------------------------------------------------------------------------
// FORBEREDER SQL SPØRRING TIL bind_param (INSERT)
//--------------------------------------------------------------------------------------

$stmt = $mysqli->prepare("INSERT INTO feedback(name, email, message, subject) VALUES(?,?,?,?)");

//--------------------------------------------------------------------------------------
// bind_param UTFØRER SPØRRINGEN MED execute. (bind_param KAN IKKE UTFØRES UTEN prepare) 
//--------------------------------------------------------------------------------------

$stmt->bind_param("ssss", $name, $email, $message, $subject);
if($stmt->execute())
{
    echo 'success';
}else{
    echo 'failure';
}

//--------------------------------------------------------------------------------------

?>