<?php

session_start();
 

$_SESSION = array();

session_destroy();

header("location: /WDV341/loginandlogout/login.php");
exit;
?>