<?php
include('datos.php');


if(isset($_POST['tarjeta']) && isset($_POST['numTarjeta']) && isset($_POST['titularTarjeta']) && !empty($_POST['tarjeta']) && !empty($_POST['numTarjeta']) && !empty($_POST['titularTarjeta'])){
	$correo_usuario = $_SESSION['correo'];
	echo 'todo bien';
	$tarjeta = mysql_real_escape_string($_POST['tarjeta']);
    echo $tarjeta;
	$numTarjeta = mysql_real_escape_string($_POST['numTarjeta']);
	$titularTarjeta = mysql_real_escape_string($_POST['titularTarjeta']);
	$importe_total = $_SESSION['importe'];
	$fecha = date('Y-m-d');
    echo $importe_total;
    echo $correo_usuario;
	$sql = "INSERT INTO compras (correo_usuario, tarjeta, num_tarjeta, titular_tarjeta, importe_total, fecha) VALUES ('$correo_usuario', '$tarjeta', '$numTarjeta', '$titularTarjeta', $importe_total, '$fecha')";

	$res = mysql_query($sql) or die("error aca: ".mysql_error());

	$error = false;

	if($res){
		$id_compra = mysql_insert_id();
		echo 'aca estamos por entrar al bucle';
		foreach($_SESSION['carrito'] as $valor=>$clave){
			$cant = $clave['cant'];
			$precio = $clave['precio'];

			$sql = "INSERT INTO detalles_compra (id_compra, id_producto, cantidad, precio) VALUES ( $id_compra, $valor, $cant, $precio)";

			$resp = mysql_query($sql) or die ('error:'. mysql_error());
				
		}
	}
	else{
		$error = true;
	}

	if(!$error){
		$_SESSION['compra_ok'] = true;

		// Limpio el carrito porque ya realizó la compra
		unset($_SESSION['carrito']);
		$_SESSION['importe_total'] = 0;


		header('location:gracias.php');
	}
}



?>