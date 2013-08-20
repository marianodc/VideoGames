<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
<link href="css/estilos.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<title>Login</title>
</head>

<body>
      <div id="nav-sup">
          <p><a href="aboutus.php" name="aboutus">Quienes somos</a>  <a href="term-usos.php" name="polit-priv">Términos de Uso</a></p>
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
              <li class="inf-reg" >&nbsp;&nbsp; Bienvenido: <?php echo $_SESSION['usuario'];  ?></li>
              <li ><a href="logout.php" >&nbsp;&nbsp;Salir</a></li>   
            <?php } 
             else { ?>
               <li><a href="login.php" name="login" title="logueate">Ingresar</a></li>
               <li style="margin-left:3em;"> [Usuario Anonimo] </li>
            <?php 
            }
            ?>
        </ul>
    </div><!-- cierre de nav -->
 </div><!--cierre de cabecera-->

  <div id="ubicacion">
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Detalle de Compra</span>
  </div><!--cierre de ubicacion-->
  
  <div id="contenedor" >

    	<div id="cont-login">
    		<h1 class="titulos"> Ingresa a Compralibros.com </h1>
			
           		 <?php
					if (isset($_GET['Exito'])){
						  echo '<center style="color:#F90; font-weight:bold;">Usuario registrado con Exito!. Ahora puedes acceder a tu perfil.</center><br><br>';
          }
				?>	
           			 <div id="logueo"> 
          			 	<span class="titulos">Accede a tu perfil</span>
								    <form action="validar_usuario.php" method="POST">
						          <table cellpadding="5">
                        <tr>
										     <td><label for="Usuario">Usuario</label></td> <td><input type="text" name="usuario" size="15" maxlength="20" class="searchtext" /></td>
									       </tr>	
									       <tr>	
										     <td><label for="Contraseña">Contraseña</label></td><td><input type="password" name="password" size="15" maxlength="20" class="searchtext" /></td>
									       </tr>     
                      </table>
								     <center><input type="submit" value="Accede" class="searchsubmit"/></center>
                    </form>

                    <h1 class="titulos">Registrate</h1>
						        <p> ¿No tenes cuenta? - <a href="registro.php" class="titulos" name="registrate" style="text-decoration:none" >Registrate</a> en Bitsionario y disfruta
								    de nuestra libreria
						        </p>
               	</div>
    
    	 </div><!--cierre de cont-login-->
    </div><!--cierre de contenedor-->
      <div id="contacto"><p><span style="font-size:24px; color: #FFF; font-weight:bold;">Direccion:</span><br>Pais: Argentina <br><br> Ciudad: Corrientes <br><br> Correo:compralibros@gmail.com<br /><br />Telefono: (0379)44258733</p>
          <div style="position:relative; left:450px; bottom:175px;"><span style="font-size:24px; color: #FFF; font-weight:bold; margin:auto;">Seguinos:</span><br /><img src="imagenes/facebook.png" /><a href="http://www.facebook.com" target="_blank"> Facebook </a><br />
            <img src="imagenes/twitter.png" /><a href="http://www.twitter.com" target="_blank">Twitter</a><br />
          </div>
        </div><!--contacto-->
  
  <div id="pie"><p>© Copyright 2012 CompraLibros 2012 - Todos los derechos reservados</p>
        <p>
            <a href="http://validator.w3.org/check?uri=referer"><img
            src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
            </a>
        </p>
     </div><!--Cierre de pie-->
  


</body>
</html>