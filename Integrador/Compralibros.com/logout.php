<?php
session_start();
#Cerramos toda la sesion y destruimos las variables de sesion	
session_unset();
session_destroy();
header('location: index.php');
?>