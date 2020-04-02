<?php

// ----------------------------------------------------------------------------------------------------
// Før session slettes gjenopprettes den 
// ----------------------------------------------------------------------------------------------------

session_start();

// ----------------------------------------------------------------------------------------------------
// Ødelegger alle sessions data før utlogging
// ----------------------------------------------------------------------------------------------------

session_destroy();

// ----------------------------------------------------------------------------------------------------
// Videresender bruker til login.php etter utlogging
// ----------------------------------------------------------------------------------------------------

header("location: logout.php");

?>