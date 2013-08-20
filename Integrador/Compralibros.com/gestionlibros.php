<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
  <link href="css/estilos.css" type="text/css" rel="stylesheet" />
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
  <title>Gestion de Libros</title>
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
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Gestion de Libros</span>
  </div><!--cierre de ubicacion-->
  
  <div id="contenedor" >
		<div class="lateral-der">

            <div id="carrito">
                        <center><img src="imagenes/boton-panel-decontrol.png" width="175" height="50" /></center>
                        <ul>
                        <li><a href="gestionlibros.php" class="link">Gestion de Libros</a></li>
                        <li><a href="Gestioncategorias.php" class="link">Gestion de categorias</a></li>
                        <li><a href="Gestionautores.php" class="link">Gestion de autores</a></li>
                        <li><a href="mensajes.php" class="link" > Bandeja de mensajes </a></li>
                        </ul>
            </div>

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

			<div id='acciones'>
				<a href="gestionlibros.php?agregar" name="agregar" class="boton">Agregar Libro</a><br>
				<br>
				<?php
                if(isset($_GET['agregar'])){ ?>
                    <center>
                        <table>
                            <form action="gestionlibros.php?agregar" method="post">
                                <tr><td>ISBN:</td>
                                <td><input type="text" name="ISBN" maxlength="20"></input></td></tr>

                                <tr><td>nombre:</td>

                                <td><input type="text" name="nombre" maxlength="50"></input></td></tr>

                               <tr><td>Editorial:</td>

                                <td><input type="text" name="editorial" maxlength="50"></input></td></tr>

                               <tr><td>Año:</td>

                                <td><input type="text" name="anio" maxlength="4"> </input></td></tr>

                               <tr><td>Descripcion:</td>

                                <td><textarea name="descripcion" cols="30" rows="10"></textarea></td></tr>

                                <tr><td>Precio:</td>

                                <td><input type="text" name="precio" ></input></td></tr>

                               <tr><td>Categoria:</td>

                                <?php   

                                    $nombres = "SELECT * FROM categorias";
                                    $resp = mysql_query($nombres) or die(mysql_error());?>

                                        <td><select name='categoria'>
                                        <?php while ($fila = mysql_fetch_array($resp)) {
                                            echo "<option value='" .$fila['categoria']."'>".$fila['categoria'] ."</option>";                                         
                                            
                                        }

                                          echo"</select></td>";
                                    ?>

                                <tr><td>Autor</td>
                                 <?php   

                                    $nombres = "SELECT * FROM autores";
                                    $resp = mysql_query($nombres) or die(mysql_error());

                                     echo"<td><select name='autor' >";                                    
                                        while ($fila = mysql_fetch_array($resp)) {
                                            echo "<option value='" .$fila['autor']."'>".$fila['autor']."</option>";                                   
									       } 

                                             echo"</select></td>";
                                           ?>

                                <tr><td>Imagen del libro:</td>
                                <td><input type="file" name="imagen" value="imagen"></input></td></tr>
                        </table>
                               <input type="submit" name="agregar" value="agregar" class="searchsubmit"></input>
                            </form>
                    </center>
                    <br><br><br>
               
               <?php
                    
                    if(isset($_POST['agregar'])){    

                        extract($_REQUEST);             		
						
                            	if(empty($ISBN)|| empty($nombre)||empty($editorial)|| empty($anio)|| empty($descripcion)|| empty($precio)|| empty($autor)|| empty($categoria) || empty($imagen)){
                                	echo '<b>Ingrese todos los campos por favor<b><br>';
									                 exit;

                            	}#fin de: si ningun campo esta vacio
                           		 else{
                                $ruta="Imagenes/";

                                $ruta=$ruta.$imagen;

                                $query = "SELECT * FROM libros WHERE ISBN = '$ISBN'";
                                
                                $resp = mysql_query($query);

                                    if(mysql_num_rows($resp) > 0){#Existe el producto en la base de datos ?
                                        echo 'El producto ya existe en la Base de datos<br><br>';
                                    	
									             }


                                    else{
										#Inserto el nuevo libro en la base de datos

                                    	$agregar = "INSERT INTO libros(ISBN, nombre, editorial, anio, descripcion, precio, categoria, autor, imagen) VALUES ('$ISBN', '$nombre', '$editorial', '$anio', '$descripcion', '$precio', '$categoria', '$autor', '$ruta')";
                                    	$query = mysql_query($agregar) or die (mysql_error());
                                        if($query){echo '<b>Libro agregado Correctamente<br><br>'; ?>
                                        
                                        <img src= <?php echo $ruta.'<br><br>'; ?>
									      
                                    <?php  }
                                    }


                            }
						
						}

					}
				
               ?>
                <br>
                <a href="gestionlibros.php?modificar" class="boton">Modificar Libro</a><br><br>
				        <?php 
                       if(isset($_GET['modificado'])){echo'Libro modificado correctamente';} 
                        if(isset($_GET['modificar'])){?>

                            <center>
                                <h2 class="titulos"> Modificar Libro </h2>
                                 <p>Podes buscar por: nombre, autor o editorial el libro que deseas modificar </p>
                                    <div id="buscador">
                                        <form action="Panel de control.php?modificar" method="post">
                                         Palabra: <input type="text" name="palabra" class="searchtext">
                                         <input type="submit" name="buscador" value="Buscar"class="searchsubmit">
                                        </form>
                                    </div>
                            </center>
                            <?php

                                if (isset($_REQUEST["palabra"]))
                                {
                        // Tomamos el valor ingresado
                                     $buscar = $_REQUEST["palabra"];

                                        // Si está vacío, lo informamos, sino realizamos la búsqueda
                                         if(empty($buscar))
                                        {
                                            echo "No se ha ingresado una cadena a buscar";
                                        }else{
                                        // Conexión a la base de datos y seleccion de registros
                                            $con=mysql_connect($serv,$user,$pass);
                                            mysql_select_db($base, $con);
                                            $sql = "SELECT * FROM libros WHERE nombre like '%$buscar%' OR editorial like '%$buscar%' OR categoria like '%$buscar%' ORDER BY ISBN DESC";

                                            $result = mysql_query($sql, $con) or die( "Error en consulta: " . mysql_error() );

                                            // Tomamos el total de los resultados
                                            $total = mysql_num_rows($result);
                                            // Imprimimos los resultados
                                                if ($row = mysql_fetch_array($result)){
                                                echo'<br><br>';
                                                echo "Resultados para: <b>$buscar</b><br>";
                                                do {
                                                    
                                                    $clave = $row['id_libro'];?>
                                                    <table cellpadding="5"  bordercolor="#CCCCCC" style="border:1px solid #CCC; color:#000;" rules="all">
                                                        <tbody  align="center" style="color:#FFF; background:#FC6; font-weight:bold;" >
                                                            <tr><td>ISBN</td><td>Nombre</td><td>Autor</td><td>Editorial</td><td>Precio/unidad</td><td>Imagen</td><td>Stock</td></tr>
                                                        </tbody>
                                                        <tr>
                                                            <td><?php echo $row['ISBN'];?></td>
                                                            <td><?php echo $row['nombre']; ?></td>
                                                            <td><?php echo  $row['autor']; ?></td>
                                                            <td><?php echo  $row['editorial'];?></td>
                                                            <td><?php echo  '$'. $row['precio'];?></td>
                                                            <td><img src="<?php echo $row['imagen']; ?>" width="100"></td>
                                                        </tr>
                                                    </table>   
                                                    <?php 
                                                        if(isset($_SESSION['logueado']) && !isset($_SESSION['importe'])){#si es administrador
                                                            echo "<center><a href='Modificar.php?clave=".$clave."' class='link'>Modificar</a>";
                                                        }
                                                            echo "<center>------------------------------------------------------------------------------------------------</center>";
                                                } while ($row = mysql_fetch_array($result));


                                                    echo "<p><b>Resultados:</b> $total</p>";
                                                
                                        } else {
                                        // En caso de no encontrar resultados
                                        echo "No se encontraron resultados para: <b>$buscar</b>";
                                        }
                                }   
                    }
                }
				?>
			</div><!--cierre del buscador-->
            <br>
		  	 <a href="gestionlibros.php?eliminar" class="boton">Quitar Libro</a><br><br>
            <?php
                if(isset($_GET['eliminar'])){
                    echo '<h2 class="titulos">Eliminar Libros </h2>';
                    $query = "SELECT * FROM libros";
                    $resp = mysql_query($query);
                        if(mysql_num_rows($resp) == 0){
                            echo 'No existe libros actualmente';
                            exit;
                        }
                        else{
                            
                            while($row = mysql_fetch_array($resp)){
                                echo '<center><table border=1 cellspacing=0 cellpadding=2>';
                                echo '<tr style="background:#F90"><td>Nombre</td><td>Editorial</td><td>Autor</td><td>Categoria</td><td>Precio </td></tr>';
                                echo '<tr><td>'.$row['nombre'].'</td><td>'.$row['editorial'].'</td><td>'.$row['autor'].'</td><td>'.$row['categoria'].'</td><td>$'.$row['precio'].'</td></tr>';
                                echo'</table>';
                                echo '<a href="gestionlibros.php?eliminar&mod='.$row['id_libro'].'" class="link">Eliminar</a><br>';
                                echo'--------------------------------------------------------------------------------</center><br>';
                            }

                        }

                }
		
                if(isset($_GET['mod'])){
                    extract($_REQUEST);
                    $query = "DELETE FROM libros WHERE id_libro = '$mod'";
                    $eliminado = mysql_query($query) or die ('Error al eliminar libros'.mysql_error());
                        if($eliminado){
                            echo '<b>Libro Eliminado correctamente</b>';
                        }


                }

            ?>

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



