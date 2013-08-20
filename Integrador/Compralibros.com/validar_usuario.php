<script type="text/javascript">
    function volver(){
        window.location="login.php";
    }
</script>
<?php
include('datos.php');
function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}
if(isset($_POST['usuario']) && isset ($_POST['password']))
{
	$usuario = strtolower(quitar($_POST['usuario']));
	$password = $_POST['password'];
	#$usuario = strtolower(htmlentities($_POST['usuario'], ENT_QUOTES));
	$result = mysql_query('SELECT *  FROM usuarios WHERE usuario=\''.$usuario.'\'');
	
	if($row = mysql_fetch_array($result)){
		if($row['password'] == $password){
			$_SESSION['logueado'] = 'si';
			$_SESSION['usuario'] = $row['usuario'];
			$_SESSION['correo'] = $row['correo'];
		
			if($row['categ'] == 0){
				$_SESSION['importe'] = 0;
			}
			echo 'Has sido logueado correctamente '.$_SESSION['usuario'].' <p>';
			header('Location:index.php');
		}else{
			echo 'Password incorrecto';
		}
	}else{
		echo 'Usuario no existente en la base de datos';?>
       <button  class="boton" type="button" onclick="volver()"> Volver </button>
	<?php }
	#mysql_free_result($result);
}else{
	echo 'Debe especificar un usuario y password';
}
mysql_close();
?>