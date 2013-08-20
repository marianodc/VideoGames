<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
  <link href="css/estilos.css" type="text/css" rel="stylesheet" />
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
  <title>Quienes Somos</title>
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
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Quienes somos</span>
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
                          <li><a href="Panel de control.php" class="link">Gestion de Libros</a></li>
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
    
  
		<div id="contenido">
			<h1 class="titulos"> ¿ Que es Bitsionario ? </h1>
				<p><img src="imagenes/libros02.jpg" class="imagenderecha" alt="#"/>
	Bitsionario es un sitio web que funciona hace 5 años, ayudando a los lectores y apasionados de la lectura
	a encontrar las obras que mas les gusta. Nuestra mision es poder reunir en nuestro sitio, la mas amplia y 
	variada cantidad de libros, que van desde novelas, hasta libros de historia, informatica, etc.
	Nos disntinguimos por nuestro profesionalismo y el buen trato con nuestros usuarios-lectores, ademas
	contamos con un servicio de consultas personalizado, en donde te podemos orientar para encontrar titulos
	que necesites y no recuerdes correctamente.
	Asi que ya sabes!, si de disfrutar de la lectura se trata, Bitsionario es tu mejor opcion.
				</p>

			<h1 class="titulos"> ¿Que hacemos realmente?</h1>

				<p>
    Nos especializamos en la venta de libros via online, mediante la mantencion de una base de datos de libros
	que se actualiza constantemente y a la cual podes agregar nuevo contenido si asi lo quisieras.
	La venta de libros via online, es una negocio que nos apasiona y por eso queremos que nuestros clientes esten
	satisfechos siempre. Por medio de la web, podemos hacer que nuestros pedidos lleguen a todas partes del pais
	y asi usted, al igual que miles de usuarios, tengan en sus manos los libros que tanto desean.
    			</p>

		</div><!--cierre de contenido-->
       

	</div><!--cierre de contenedor-->
        <div id="contacto"><p><span style="font-size:24px; color: #FFF; font-weight:bold;">Direccion:</span><br>Pais: Argentina <br><br> Ciudad: Corrientes <br><br> Correo:compralibros@gmail.com<br /><br />Telefono: (0379)44258733</p>
          <div style="position:relative; left:450px; bottom:175px;"><span style="font-size:24px; color: #FFF; font-weight:bold; margin:auto;">Seguinos:</span><br /><img src="imagenes/facebook.png" /><a href="http://www.facebook.com" target="_blank"> Facebook </a><br />
            <img src="imagenes/twitter.png" /><a href="http://www.twitter.com" target="_blank">Twitter</a><br />
          </div>
        </div><!--contacto-->

	<div id="pie"><p>© Copyright 2012 CompraLibros.com 2012 - Todos los derechos reservados</p>
        <p>
            <a href="http://validator.w3.org/check?uri=referer"><img
            src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
            </a>
        </p>
     </div><!--Cierre de pie-->


</body>
</html>
