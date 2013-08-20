<?php
session_start();

extract($_REQUEST);


$quitar = 1;

if($_SESSION['carrito'][$clave]['cant'] > 1){
	$_SESSION['carrito'][$clave]['cant'] -=  $quitar;
	$_SESSION['importe'] -= $_SESSION['carrito'][$clave]['precio'];
}
else{
	$_SESSION['importe'] -=  $_SESSION['carrito'][$clave]['precio'];
	unset($_SESSION['carrito'][$clave]);

}

header('location:vercarrito.php');


?>
