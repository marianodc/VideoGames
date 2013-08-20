<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
  <link href="css/estilos.css" type="text/css" rel="stylesheet" />
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
  <title>Carrito de Compras</title>
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
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Resumen de compra</span>
  </div><!--cierre de ubicacion-->
  
  <div id="contenedor" >
    
    <div id="contenido" style="margin:auto;" >
        
          <h1 class="titulos"> Este es el resumen de tu compra: <?php $_SESSION['usuario'] ?> </h1>
              <?php
               if(empty($_SESSION['carrito'])){
                            echo 'Tu carrito esta vacio, busca en nuestro <a href="libros_catalogo.php" class="link">catalogo</a> y realiza una compra.';
                         }

                        
                        else{ ?>
                            <table cellpadding="5"  bordercolor="#CCCCCC" style="border:1px solid #CCC; color:#A4A4A4;" rules="all">
                                 <tbody  align="center" style="color:#FFF; background:#FC6; font-weight:bold;" >
                                     <tr><td>ISBN</td><td>Nombre</td><td>Autor</td><td>Editorial</td><td>Precio/unidad</td><td>unidades compradas</td><td>Accion</td></tr>
                                    </tbody>
                                        <?php foreach($_SESSION['carrito'] as $valor => $clave){?> 
                                            <tr style="text-align:center">
                                                <td><?php echo $clave['ISBN']; ?></td>
                                                <td><?php echo $clave['nombre']; ?></td>
                                                <td><?php echo  $clave['autor']; ?></td>
                                                <td><?php echo  $clave['editorial']; ?></td>
                                                <td><?php echo  '$'. $clave['precio']; ?></td>
                                                <td><?php echo  $clave['cant']; ?></td>
                                                <td><?php echo '<a href="quitar_producto.php?clave=' .$clave['ISBN']. '"class=link>'; ?> Quitar </a></td>
                                            </tr>
                                         <?php }
                                         }

                                      ?>
                            </table>    
                            
                         
          <?php
                 echo'<br>';
                 echo '<b>Importe total a pagar</b>: $'.$_SESSION['importe'].'<br><br>';
                 echo'<a href="vaciarcarrito.php" class="link"><img src="Imagenes/cancelar.png" border="0" width="35" height="35"/> cancelar compra </a><br><br>';
                 echo'<a href="vercarrito.php?comprar" class="link"><img src="Imagenes/buy.png" border="0" width="35" height="35" /> efectuar compra </a><br><br>';

                 if(isset($_GET['comprar'])){ ?>
                  <form action="confirmar_compra.php" method="post">
                    <fieldset>
                      <legend>Datos Personales</legend>
                        <table>
                          <tr><td><strong>Nombre y Apellido:<input type="text" name="titular_tarjeta"> </strong></td><td></td></tr>
                          <tr><td><strong>Domicilio:<input type="text" name="domicilio"> </strong></td><td></td></tr>
                          <tr><td><strong>Telefono:<input type="text" name="tekefono" </strong></td><td></td></tr>
                          
                        <!--<tr><td><strong>Pais: </strong></td><td></td></tr>
                          <tr><td><strong>Provincia: </strong></td><td></td></tr>
                          <tr><td><strong>Ciudad: </strong></td><td></td></tr>
                          <tr><td><strong>Código Postal: </strong></td><td></td></tr>-->
                        </table>
                      </fieldset>

                      <fieldset>
                       <legend>Medio de pago</legend>
                        <table>
                          <tr><td>Tarjeta: </td></tr>
                            <select name="tarjeta" id="tarjeta">
                              <option value="">Seleccionar</option>
                              <option value="visa">Visa</option>
                              <option value="master">Mastercard</option>
                              <option value="american">American Express</option>
                            </select>
                          <tr><td>Núm. Tarjeta: </td><td><input type="text" name="numTarjeta"></td></tr>
                           <tr><td>Titular Tarjeta: </td><td><input type="text" name="titularTarjeta"></td></tr>
                        </table>
                      </fieldset>

                      <input type="submit" value="Comprar" name="comprar">
                  </form>         
      <?php } ?>
     
       
        </div><!-- cierre de contenido -->
    
         
  </div><!---cierre de contenedor-->
     
      <div id="contacto"><p><span style="font-size:24px; color: #FFF; font-weight:bold;">Direccion:</span><br>Pais: Argentina <br><br> Ciudad: Corrientes <br><br> Correo:compralibros@gmail.com<br /><br />Telefono: (0379)44258733</p>
          <div style="position:relative; left:450px; bottom:175px;"><span style="font-size:24px; color: #FFF; font-weight:bold; margin:auto;">Seguinos:</span><br /><img src="imagenes/facebook.png" /><a href="http://www.facebook.com" target="_blank"> Facebook </a><br />-->
            
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