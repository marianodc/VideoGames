<?php
include ('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
<link href="css/estilos.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<title>Regitrate en Compralibros.com</title>
</head>

<body>
  		<div id="nav-sup">
          <p><a href="aboutus.php" name="aboutus">Quienes somos</a> <a href="term-usos.php" name="polit-priv">Términos de Uso</a></p>
       </div> 
  <div id="cabecera" >
       

     
        <img src="imagenes/BajaLibros copia.png" name="libros" title="libros" class="imagenizquierda" /><br />
    
    <div class="nav">
        <ul>
            <li><a href="index.php" name="Home" title="Home" >Home</a></li>
            <li><a href="consultas.php" name="consultas" title="consultanos" >Consultas</a></li>
            <li><a href="libros_catalogo.php" name="libros" title="Libros">Libros/Catalogo</a></li>
            <li><a href="venta.php" name="venta" title="catalogo">Venta</a></li>
            <?php
            if(isset($_SESSION['logueado']))
                { ?>
              <li class="inf-reg" >|&nbsp;&nbsp; Bienvenido: <?php echo $_SESSION['usuario'];  ?></li>
              <li class="inf-reg"> |&nbsp;&nbsp; <a href="inf_usuario.php"> Mi perfil </a></li>
              <li ><a href="logout.php" >|&nbsp;&nbsp;Salir</a></li>   
            <?php } 
             else { ?>
               <li><a href="login.php" name="login" title="logueate">Ingresar</a></li>
            <?php 
            }
            ?>
        </ul>
    </div><!-- cierre de nav -->
 </div><!--cierre de cabecera-->
 	<div id="ubicacion">
  			Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;&nbsp;Ingresar&nbsp;-&nbsp;<span>Registrate!</span>
	</div><!--cierre de ubicacion-->

<?php function formRegistro(){ ?>
<div id="contenedor">
	<div id= "cont-reg">

		<p class="titulos">Registrate para disfrutar de Bitsionario</p>

		<p> Para registrarte necesitas elegir un nombre de usuario y una contraseña </p>
			
				
					<form action="registro.php" method="POST">
						<table align="center">	
						<tr>
					 		<td>Nombre y Apellido</td> <td><input type="text" name="usuario" size="15" maxlength="20" class="searchtext" /></td>
						</tr>
						<tr>
							<td>Password:</td> 
							<td><input type="password" name="password" size="10" maxlength="10" class="searchtext" /></td>
						</tr>
						<tr>
							<td>Confirma tu password:</td>
							<td><input type="password" name="password2" size="10" maxlength="10" class="searchtext" /></td>
						</tr>
						<tr>
							<td>Email:</td> 
							<td><input type="text" name="correo" size="20" maxlength="40" class="searchtext" /></td>
						</tr>
						<tr>
							<td>Pais:</td> 
							<td><input type="text" name="pais" size="20" maxlength="40" class="searchtext" /></td>
						</tr>
						<tr>
							<td>Provincia:</td> 
							<td><input type="text" name="provincia" size="20" maxlength="40" class="searchtext" /></td>
						</tr>
						<tr>
							<td>Telefono:</td> 
							<td><input type="text" name="telefono" size="20" maxlength="40" class="searchtext" /></td>
						</tr>
						<tr>
							<td>Domicilio:</td> 
							<td><input type="text" name="domicilio" size="20" maxlength="40" class="searchtext" /></td>
						</tr>
						<tr>
							<td>DNI:</td> 
							<td><input type="text" name="provincia" size="20" maxlength="40" class="searchtext" /></td>
						</tr>
					</table>
						<center><input type="submit" value="Registrar" class="searchsubmit"/></center>
				</form>
				
				</div><!--cierre de cont-reg-->
 			</div>	<!--cierre de contenedor-->
		<?php
					} 

// verificamos si se han enviado ya las variables necesarias.

if (isset($_POST["Registrar"])) {
	extract($_REQUEST);
	// Hay campos en blanco
	if($usuario==NULL|$password==NULL|$password2==NULL|$correo==NULL) {
		echo '<center style="color:#F90; font-weight:bold;">un campo está vacio.</center>';
		formRegistro();
	}else{
		// ¿Coinciden las contraseñas?
		if($password!=$password2) {
		echo '<center style="color:#F90; font-weight:bold;">Las contraseñas no coinciden.</center>';
			formRegistro();
		}else{
			// Comprobamos si el nombre de usuario o la cuenta de correo ya existían
			$checkuser = mysql_query("SELECT usuario FROM usuarios WHERE usuario='$usuario'");
			$username_exist = mysql_num_rows($checkuser);
			$checkemail = mysql_query("SELECT correo FROM usuarios WHERE correo ='$correo'");
			$email_exist = mysql_num_rows($checkemail);
			if ($email_exist>0|$username_exist>0) {
				echo '<center style="color:#F90; font-weight:bold;">El nombre de usuario o la cuenta ya existe.</center>';
				formRegistro();
			}else{
				$query = "INSERT INTO usuarios (usuario, password,correo, pais, provincia, telefono, domicilio,DNI)
				VALUES ('$usuario','$password','$correo','$pais','$provincia','$telefono','$domicilio','$dni')";
				mysql_query($query) or die(mysql_error());
				header('Location: login.php?Exito');
				?>
				<!--<FORM ACTION="validar_usuario.php" METHOD="post">
				  Usuario : <INPUT TYPE="text" NAME="usuario" SIZE=20 MAXLENGTH=20><br />
				  Password: <INPUT TYPE="password" NAME="password" SIZE=10 MAXLENGTH=10><br />
				  <INPUT TYPE="submit" VALUE="Ingresar">-->
				</FORM>
				<?php
			}
		}
	}
}else{
	formRegistro();
}
?>		


<div id="contacto"><p><span style="font-size:24px; color: #FFF; font-weight:bold;">Direccion:</span><br>Pais: Argentina <br><br> Ciudad: Corrientes <br><br> Correo:compralibros@gmail.com<br /><br />Telefono: (0379)44258733</p>
            <div style="position:relative; left:450px; bottom:175px;"><span style="font-size:24px; color: #FFF; font-weight:bold; margin:auto;">Seguinos:</span><br /><img src="imagenes/facebook.png" /><a href="http://www.facebook.com" target="_blank"> Facebook </a><br />
              <img src="imagenes/twitter.png" /><a href="http://www.twitter.com" target="_blank">Twitter</a><br />
            </div>
        </div><!--contacto-->

	<div id="pie"><p>© Copyright 2012 Bitsionario 2012 - Todos los derechos reservados</p>
    	<p>
    	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
        </p>
    </div><!--Cierre de pie-->


</body>
</html>