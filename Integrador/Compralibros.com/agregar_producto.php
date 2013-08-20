<?php
include ('datos.php');
mysql_connect($serv, $user, $pass) or die('Error al conectarse al servidor'. mysql_error());
mysql_select_db($base) or die('Error al selecionar db'. mysql_error());

$compras = array();

$clave = $_GET['clave'];

$cant=1;

if(isset($_SESSION['carrito'][$clave])){
	$_SESSION['carrito'][$clave]['cant'] += $cant;
	$_SESSION['importe']+= $_SESSION['carrito'][$clave]['precio'];
}

else 
	{
		$sql = "SELECT * FROM libros WHERE ISBN like '%$clave%'";
	
		$result = mysql_query($sql) or die( "Error en consulta: " . mysql_error() );

		// Tomamos el total de los resultados
		$total = mysql_num_rows($result);
		// Imprimimos los resultados
		if ($row = mysql_fetch_array($result)){ 
			
			$compras = array(
			'ISBN' => $row['ISBN'],
			'nombre' => $row['nombre'],
			'editorial' => $row['editorial'],
			'precio' => $row['precio'],
			'categoria' => $row['categoria'],
			'autor' => $row['autor'],
			'cant' => $cant);
			$_SESSION['carrito'][$clave] = $compras;
			$_SESSION['importe']+= $_SESSION['carrito'][$clave]['precio'];
		}
}					
										
					
if(isset($_GET['red'])){
	header("location:{$_GET['red']}");
}

?>