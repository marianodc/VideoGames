<?php
session_start();

unset($_SESSION['carrito']);
$_SESSION['importe'] = 0;

header('location:vercarrito.php');

?>