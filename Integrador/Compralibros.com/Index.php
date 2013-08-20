<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
  <link href="css/estilos.css" type="text/css" rel="stylesheet" />
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
  <title>Home</title>
</head>

<body >
      <div id="nav-sup">
          <p><a href="aboutus.php" name="aboutus">Quienes somos</a>  <a href="term-usos.php" name="polit-priv">Términos de Uso</a></p>
       </div> 
        <div id="cabecera" >
      
          <img src="imagenes/BajaLibros copia.png" name="libros" title="libros" class="imagenizquierda"  /><br />
    
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
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Home</span>
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
                    #cuando sea un administrador de la pagina
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
    
    
            <h2> Recomendado de la semana </h2>
               <div id="recomendado">
                	<p> Esta semana en bitsionario te recomendamos el siguiente libro </p>
                	<img src="imagenes/como-agua-para-chocolate.jpg" class="recomendado" name="aguaparachocolate" alt="#" />
                 	
                    
    			     </div>
    
    
        </div><!--cierre lateral-der-->
    
  
		<div id="contenido" >
			
            <h1 class="titulos"> !!Bienvenidos!!</h1><img src="imagenes/comprar-libros-online.jpg" class="imagenderecha" name="Libro-digital" />
				<p id="primero">
                    Bitsionario es el lugar en la web en donde podras encontrar un gran catalogo de los mas nuevos y 					famosos libros,
                    asi como tambien, aquellos libros que tienen historia y son recomendados por otros lectores.
                    Si bien hoy en dia la lectura de libros esta un poco desvalorizada, éstos son fundamentales para el aprendizaje y contienen
                    informacion rica y ofrecen un espacio mas grande para dejar volar la imaginacion.
                    Si te apasiona la lectura, y te gustaria agregar nuevos titulos a tu biblioteca, entonces este es tu lugar. Y no te preocupes si no encuentras
                    lo que estas buscando, por que tambien podes hacernos tus pedidos y nosotros te ayudaremos a conseguir
				</p>

			<h1 class="titulos"> Top Libros de la semana</h1>
  				<p>En bitsionario, todas las semanas creamos un "Top Libros", donde colocamos 5 de los mejores libros o los mas premiados, estos libros conrresponden a diferentes categorias. Hechale un vistazo al top de esta semana a continuacion.</p>  
    
    
    			<div id="cont-galeria">
      				<ul id="galeria">     
  <!-- TOP 1--> 
        				<li class="mostrar">1<!--<a href="" name="agregar" title="Agregar al carrito"><div class="boton-carrito"></div></a>-->
        					
                            <p class="descripcion">
                            		<?php
                                  
                                  $clave = "2542-656-5632";
                                  $libro = "SELECT * FROM libros WHERE ISBN like '%$clave%'";
                                  $resp = mysql_query($libro) or die (mysql_error());
                                    if($row = mysql_fetch_array($resp)){
                                      echo '<b>ISBN:</b>' .$row['ISBN'].'<br>';
                                      echo '<b>Nombre:</b>' .$row['nombre'].'<br>';
                                      echo '<b>Editorial:</b>' .$row['editorial'].'<br>';
                                      echo '<b>Año de edicion:</b>'.$row['anio'].'<br>';
                                      echo '<b>Autor:</b>'.$row['id_autor'].'<br>';
                                    }
                                ?>
                                  
                            </p>
         					<img src="imagenes/las-mil-noches-y-una-noche.jpg" name="top1" alt="#" />
        				</li>
  <!-- TOP 2-->        
       					<li>2
        						         <p class="descripcion">   
                                <?php
                                  $clave = "323-652-4565-15-6";
                                  $libro = "SELECT * FROM libros WHERE ISBN like '%$clave%'";
                                  $resp = mysql_query($libro) or die (mysql_error());
                                    if($row = mysql_fetch_array($resp)){
                                      echo '<b>ISBN:</b>' .$row['ISBN'].'<br>';
                                      echo '<b>Nombre:</b>' .$row['nombre'].'<br>';
                                      echo '<b>Editorial:</b>' .$row['editorial'].'<br>';
                                      echo '<b>Año de edicion:</b>'.$row['anio'].'<br>';
                                      echo '<b>Autor:</b>'.$row['id_autor'].'<br>';
                                    }
                                ?>
                                   
                            </p>
        					<img src="imagenes/El principito.jpg" name="top2" alt="#" />
        				</li>
        
  <!-- TOP 3-->
       					 <li>3<!--<a href="" name="agregar" title="Agregar al carrito">
                         	<div class="boton-carrito"></div></a>-->   
                            <p class="descripcion">
                            	<?php
                                  $clave = "978-987-1220-19-9";
                                  $libro = "SELECT * FROM libros WHERE ISBN like '%$clave%'";
                                  $resp = mysql_query($libro) or die (mysql_error());
                                    if($row = mysql_fetch_array($resp)){
                                      echo '<b>ISBN:</b>' .$row['ISBN'].'<br>';
                                      echo '<b>Nombre:</b>' .$row['nombre'].'<br>';
                                      echo '<b>Editorial:</b>' .$row['editorial'].'<br>';
                                      echo '<b>Año de edicion:</b>'.$row['anio'].'<br>';
                                      echo '<b>Autor:</b>'.$row['id_autor'].'<br>';
                                    }
                                ?>
                                   
                            </p>
                            <img src="imagenes/matematica.png" name="matematica" alt="#"  />
                         </li>
        
  <!-- TOP 4-->      
        
        				<li>4<!--<a href="" name="agregar" title="Agregar al carrito">
                        	<div class="boton-carrito"></div></a>-->
                            <p class="descripcion">
                            	<?php
                                  $clave = "2221-5255-3653";
                                  $libro = "SELECT * FROM libros WHERE ISBN like '%$clave%'";
                                  $resp = mysql_query($libro) or die (mysql_error());
                                    if($row = mysql_fetch_array($resp)){
                                      echo '<b>ISBN:</b>' .$row['ISBN'].'<br>';
                                      echo '<b>Nombre:</b>' .$row['nombre'].'<br>';
                                      echo '<b>Editorial:</b>' .$row['editorial'].'<br>';
                                      echo '<b>Año de edicion:</b>'.$row['anio'].'<br>';
                                      echo '<b>Autor:</b>'.$row['id_autor'].'<br>';
                                    }
                                ?>
                                   
                            </p>
                           <img src="imagenes/sistemas-operativos-modernos.jpg" name="S.O" alt="#" />   
                        </li>
        		
  <!-- TOP 5-->      
        
       					<li>5<!--<a href="" name="agregar" title="Agregar al carrito">
                        	<div class="boton-carrito"></div></a>-->
                    		<p class="descripcion">
                            	<?php
                                  $clave = "2132-56-52";
                                  $libro = "SELECT * FROM libros WHERE ISBN like '%$clave%'";
                                  $resp = mysql_query($libro) or die (mysql_error());
                                    if($row = mysql_fetch_array($resp)){
                                      echo '<b>ISBN:</b>' .$row['ISBN'].'<br>';
                                      echo '<b>Nombre:</b>' .$row['nombre'].'<br>';
                                      echo '<b>Editorial:</b>' .$row['editorial'].'<br>';
                                      echo '<b>Año de edicion:</b>'.$row['anio'].'<br>';
                                      echo '<b>Autor:</b>'.$row['id_autor'].'<br>';
                                    }
                                ?>
                                   
                            </p>
                        
                        <img src="imagenes/Steve-jobs-a-briography.jpg" name="stevejobs" alt="#" />
                        </li>
     			 	</ul> 
   			 </div><!--cierre de cont-galeria-->
    
  
			       <div id="novedades">

                  <h1 class="titulos">Ultimas novedades en Bitsionario</h1>    
                
                    <?php
                      $novedades = "SELECT * FROM libros ORDER BY id_libro DESC LIMIT 0, 3 ";
                      $respuesta = mysql_query($novedades) or die(mysql_error());
                      $clave = $row['ISBN'];
                                          while($row = mysql_fetch_array($respuesta)){
											$clave = $row['ISBN'];  
                                            echo'<table cellpadding="0"  style="border:1px solid #EAEAEA; color:#000;" >';?>
                                            <tr><td rowspan ="8"><img src=<?php echo $row['imagen']; ?> width="100" height="200"></td></tr> 
                                            <?php
											                      echo '<tr><td style="background:#FC6;"><b>ISBN:</td></b><td>'. $row['ISBN'].'<br></td></tr>';
                                            echo '<tr><td><b>Nombre del libro:</b></td><td>'.$row['nombre'].'</td><br></tr>';
                                            echo '<tr><td style="background:#FC6;"><b>Autor del libro:</td></b><td>'. $row['autor'].'<br></td></tr>';
                                            echo '<tr><td style="background:#FC6;"><b>Editorial del libro:</td></b><td>'. $row['editorial'].'<br></td></tr>';
                                            echo '<tr><td style="background:#FC6;"><b>Año de edicion:</td></b><td>'. $row['anio'].'<br></td></tr>';
                                            echo '<tr><td style="background:#FC6;"><b>Descripcion del libro:</td></b><td>'. htmlentities($row['descripcion']).'<br></td></tr>';
                                            echo '<tr><td style="background:#FC6;"><b>Precio del libro:</b></td><td>'.'$'. $row['precio'].'</td></tr>';
                                            echo '</table>';
                                            if(isset($_SESSION['logueado']) && isset($_SESSION['importe'])){
                                            echo "<center><a href='agregar_producto.php?clave=" . $clave . "&red=Index.php' class='link'>Agregar al carrito</a></center>";}
                                            echo "<center>------------------------------------------------------------------------------------------------</center>";
                                        } ?>
                    
                    
                </div>
			</div><!--cierre de contenido-->

    
      </div><!--contacto-->

	</div><!--cierre de contenedor-->
        <div id="contacto"><p><span style="font-size:24px; color: #FFF; font-weight:bold;">Direccion:</span><br>Pais: Argentina <br><br> Ciudad: Corrientes <br><br> Correo:compralibros@gmail.com<br /><br />Telefono: (0379)44258733</p>
            <div style="position:relative; left:450px; bottom:175px;"><span style="font-size:24px; color: #FFF; font-weight:bold; margin:auto;">Seguinos:</span><br /><img src="imagenes/facebook.png" /><a href="http://www.facebook.com" target="_blank" name="facebook"> Facebook </a><br />
              <img src="imagenes/twitter.png" /><a href="http://www.twitter.com" target="_blank" name="twitter">Twitter</a><br />
            </div>
        </div><!--contacto-->

	<div id="pie"><p>© Copyright 2012 CompraLibros.com 2012 - Todos los derechos reservados</p>
    	<p>
    	<a href="http://validator.w3.org/check?uri=referer" name="validator"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
        </p>
    </div><!--Cierre de pie-->
	
</body>
</html>

