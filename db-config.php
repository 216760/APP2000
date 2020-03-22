<?php
/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

// $databaseHost     = 'itfag.usn.no';
// $databaseName     = 'v20app2000db2';
// $databaseUsername = 'v20app2000u2';
// $databasePassword = 'pw2';

$databaseHost     = 'localhost';
$databaseName     = 'gruppe2';
$databaseUsername = 'root';
$databasePassword = '';


$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
