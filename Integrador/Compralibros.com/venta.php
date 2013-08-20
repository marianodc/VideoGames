<?php
include('datos.php')
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
  <link href="css/estilos.css" type="text/css" rel="stylesheet" />
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
  <title>Informacion de ventas</title>
</head>

<body>
      <div id="nav-sup">
          <p><a href="aboutus.php" name="aboutus">Quienes somos</a>  <a href="term-usos.php" name="polit-priv">T�rminos de Uso</a></p>
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
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Venta</span>
  </div><!--cierre de ubicacion-->
  
  <div id="contenedor" >
		<div class="lateral-der">

            <?php 
                    #cuando sea un usuario normal
                    if(isset($_SESSION['logueado']) && isset($_SESSION['importe'])){?>
                       <div id="carrito">
                          <center><img src="imagenes/boton-carro-de-compras.gif" width="175" height="50" /></center>
                          <?php echo '<a href="vercarrito.php" class="link">|>Ver detalle de compra</a><br>';
                            echo '<br>';
                              if(empty($_SESSION['importe'])){echo '<b>Su carrito esta vacio</b><br>';}
                              else{echo '<a href="vaciarcarrito.php" class="link">|>Cancelar compra</a><br>';}
                            echo'<br>';
                            echo '<b>Importe total:</b> $'.$_SESSION['importe'].'';
                        ?>
                    </div>
                   <?php } 
                    else if (!isset($_SESSION['importe']) && isset($_SESSION['logueado'])){
                        ?>
                        <div id="carrito">
                        <center><img src="imagenes/boton-panel-decontrol.png" width="175" height="50" /></center>
                        <ul>
                        <li><a href="gestionlibros.php" class="link">Gestion de Libros</a></li>
                        <li><a href="Gestioncategorias.php" class="link">Gestion de categorias</a></li>
                        <li><a href="Gestionautores.php" class="link">Gestion de autores</a></li>
                        <li><a href="mensajes.php" class="link"> Bandeja de mensajes </a></li>
                        </ul>
                      </div>
                    <?php } ?>
                    
            
                <div id="cat">
                <h2> Categorias </h2>
                <?php
                $nombres = "SELECT * FROM categorias";
                $resp = mysql_query($nombres) or die(mysql_error());
                  echo '<ul>';
                  while($cat = mysql_fetch_array($resp)){
                    echo '<li><a href="libros_catalogo.php?palabra='.$cat['categoria'].'">'.$cat['categoria'].'</a></li>'; 
                  }
                  echo '<ul>';
                ?>
                </div>
    
            
                <div id="recomendado">
                  <h2> Recomendado de la semana </h2>
                	<p> Esta semana en bitsionario te recomendamos el siguiente libro </p>
                	<img src="imagenes/como-agua-para-chocolate.jpg" class="recomendado" name="aguaparachocolate" alt="#" />
                 	<p id="descripcion"> 
                    	<span>Como agua para Chocolate</span> <br />
                    	ISBN 155899635422333123<br />
                        Autor: Laura Esquivel <br />
                        Paginas: 170<br />
                        <span> Precio: $150 </span>
                    </p>
                    
    			</div>
    
    
    
    
        </div><!--cierre lateral-der-->
    
		<div id="contenido">
				<h1 class="titulos"> Tipos de venta</h1><img src="imagenes/compra-online.jpg" class="imagenderecha" alt="#" />
					<p>
                    En bitsionario podes comprar libros sin moverte de tu casa, con tan solo un click, podes conseguir ese libro que tanto querias tener. Cada vez que quieras adquirir un libro, solamente
                    tenes que hacer click en el icono de compra: <b>"Agregar al carrito"</b> y automaticamente
                    se cargara a tu carrito de compras. Luego, para ver el resumen de tu compra, solo necesitas ingresar al menu: Carrito de compras - <b>"Ver Detalle de compra"</b>.
                    </p>

				<h1 class="titulos"> Envios a todo el pais </h1>

					<p><img src="imagenes/envios-a-todo-el-pais.png" class="imagenizquierda" alt="#" /> 
                    Hacemos envios a todo el pais, solamente necesitamos que nos des la provincia y la localidad en laque vivis cuando te registres como usuario de Bitsionario. Asi que no te preocupes si vivis lejos de una libreria o un lugar donde puedas pasar a retirarlo. Nosotros te lo hacemos llegar a la puerta en donde sea que vivas. Para mas informacion, revisa la seccion: Formas de envio y retiro del producto.
                    </p>

				<h1 class="titulos"> Formas de envio y retiro del producto</h1>
					<p>
                    Para enviar el producto, confiamos en el servicio de Correo Argentino, desde el momento en que usted realiza la compra, hay un plazo de dias que debera aguardar hasta que su pedido llegue al correo mas cercano a su domicilio. La forma de pago es contrareembolso y dependera de la zona en la que viva, para mas informacion lea a continuacion la seccion Gastos de envio y tiempo de entrega.
                    </p>


				<h1 class="titulos"> Gastos de envio y timpo de entrega </h1>

					<p>
                    A partir de la confirmaci�n de la compra y de la disponibilidad de los libros solicitados, los plazos de entrega son:
                        <table cellpadding="5"  bordercolor="#FFFFFF" style="border:1px solid #EAEAEA; color:#000;" >
                        	<tbody  align="center" style="color:#FFF; background:#F90; font-weight:bold;" >
                        		<tr>
                        			<td >Lugar</td>	 <td>Dias</td> 	
                       			</tr>
                        	</tbody>
                        	<tbody style="background:#E8E8E8;" align="center">	
                        		<tr>
                        			<td>Capital Federal </td> 	<td>2 dias habiles</td> 
                        		</tr>
                       			<tr>
                        			<td>Provincia de Buenos Aires</td> 	<td>5 dias habiles</td> 
                        		</tr>
                                <tr>
                                	<td>Resto del pais</td>	<td> 4 dias habiles</td>
                                </tr>
                        	</tbody>
                        </table>
					</p>
				<h1 class="titulos">Gastos de envio</h1>

					<p>
                    Los gastos de env�o para �rdenes dentro del pa�s consideran los siguientes montos:
                    </p>
                        <table cellpadding="5"  bordercolor="#CCCCCC" style="border:1px solid #EAEAEA; color:#000;" >
                        	<tbody  align="center" style="color:#FFF; background:#F90; font-weight:bold;" >
                        		<tr>
                        			<td >Lugar</td> <td>Por orden</td> 	<td>Por libro</td>
                        		</tr>
                       		</tbody>
                       		<tbody bgcolor="#E8E8E8" align="center">
                        		<tr>
                        			<td>Capital Federal y Prov. de Buenos Aires</td> 	<td>$ 9</td> 	<td>$ 2</td>
                        		</tr>
                        		<tr>
                        			<td>Resto del pa�s</td> 	<td>$ 9</td> 	<td>$ 3</td>
                        		</tr>
                        	</tbody>
                        </table>

					<p>
                    EJEMPLO: El costo por un solo libro esta conformado por 5 pesos de la orden, m�s 2 pesos por cada libro. 
                    Es decir, comprando 2 libros en una sola orden, el costo ascender� a 9 pesos, mientras que de contener 1 solo libro, el costo ser� de tan solo 7 pesos
                    </p>
		</div><!--fin de contenido-->  
        
	</div><!--cierre de contenedor-->
   <div id="contacto"><p><span style="font-size:24px; color: #FFF; font-weight:bold;">Direccion:</span><br>Pais: Argentina <br><br> Ciudad: Corrientes <br><br> Correo:compralibros@gmail.com<br /><br />Telefono: (0379)44258733</p>
          <div style="position:relative; left:450px; bottom:175px;"><span style="font-size:24px; color: #FFF; font-weight:bold; margin:auto;">Seguinos:</span><br /><img src="imagenes/facebook.png" /><a href="http://www.facebook.com" target="_blank"> Facebook </a><br />
            <img src="imagenes/twitter.png" /><a href="http://www.twitter.com" target="_blank">Twitter</a><br />
          </div>
        </div><!--contacto-->
	<div id="pie"><p>� Copyright 2012 CompraLibros.com 2012 - Todos los derechos reservados</p>
        <p>
        <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
        </p>
    </div><!--Cierre de pie-->

	
</body>
</html>