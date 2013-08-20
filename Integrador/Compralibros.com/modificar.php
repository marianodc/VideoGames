<?php
session_start();

include ('datos.php');

extract($_REQUEST);

if(isset($_GET['clave'])){

    $query = "SELECT * FROM libros WHERE id_libro = '$clave'";
    $resp = mysql_query($query);
    if($resp){
        $libro = mysql_fetch_array($resp);
      
    }
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
<link href="css/estilos.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<title>Home</title>
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
            Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;Panel de control&nbsp;-&nbsp;<span>Modificar libro</span>
    </div><!--cierre de ubicacion-->

    <div id="contenedor">
    
    

        <div class="lateral-der">

                    <div id="carrito">
                        <center><img src="imagenes/boton-panel-decontrol.png" width="175" height="50" /></center>
                        <ul>
                            <li><a href="gestionlibros.php" class="link">Gestion de Libros</a></li>
                            <li><a href="Gestioncategorias.php" class="link">Gestion de categorias</a></li>
                            <li><a href="Gestionautores.php" class="link">Gestion de autores</a></li>
                            <li><a href="mensajes.php" class="link"> Bandeja de mensajes </a></li>
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
                    <center>
                        <table>
                            <form action="" method="POST">
                                <tr><td>ISBN:</td>
                                <td><input type="text" name="ISBN" maxlength="20" value= "<?php echo $libro['ISBN']; ?>" style="color:#999;"></input></td></tr>

                                <tr><td>nombre:</td>

                                <td><input type="text" name="nombre" maxlength="50" value="<?php echo $libro['nombre']; ?>" style="color:#999"></input></td></tr>

                               <tr><td>Editorial:</td>

                                <td><input type="text" name="editorial" maxlength="50" value="<?php echo $libro['editorial']; ?>" style="color:#999;"></input></td></tr>

                               <tr><td>Año:</td>

                                <td><input type="text" name="anio" maxlength="4" value="<?php echo $libro['anio']; ?>" style="color:#999;"> </input></td></tr>

                               <tr><td>Descripcion:</td>

                                <td><textarea name="descripcion" cols="30" rows="10" style="color:#999;"><?php echo $libro['descripcion']; ?></textarea></td></tr>

                                <tr><td>Precio:</td>

                                <td><input type="text" name="precio" value="<?php echo $libro['precio']; ?>"  style="color:#999;"></input></td></tr>

                               <tr><td>Categoria:</td>

                                <?php   

                                    $nombres = "SELECT * FROM categorias";
                                    $resp = mysql_query($nombres) or die(mysql_error());?>

                                        <td><select name='categoria'>                                     
                                        <?php while ($fila = mysql_fetch_array($resp)) {
                                                    echo "<option value='" .$fila['categoria']."'>".$fila['categoria'] ."</option>";                                         
                                            
                                        }#del while

                                          echo"</select></td>";
                                    ?>

                                <tr><td>Autor</td>
                                 <?php   

                                    $nombres = "SELECT * FROM autores";
                                    $resp = mysql_query($nombres) or die(mysql_error());?>

                                        <td><select name='autor' >
                                        <?php while ($fila = mysql_fetch_array($resp)) {
                                            echo "<option value='" .$fila['autor']."'>".$fila['autor']."</option>";                                   
									       } 

                                             echo"</select></td>";
                                        ?>

                                <tr><td>Imagen del libro:</td>
                                <td><input type="file" name="imagen" value="<?php echo $libro['imagen']; ?>"></input></td></tr>
                        </table>
                               <input type="submit" name="modificar" value="modificar" class="searchsubmit"></input>
                            </form>
                    </center>

                   <?php
                        if(isset($_POST['modificar'])){

                            extract($_REQUEST);
                                  #Si se ingreso una nueva categoria 
                            /*if(!empty($newcategory) && $categoria = 'nueva'){  #Se ingreso una nueva categoria?
                                $query="SELECT * FROM categoria WHERE nombre = '$newcategory'";#busco si ya existe la cat dentro de la tabla autores
                                $resp = mysql_query($query) or die(mysql_error());

                                    if(mysql_num_rows($resp) > 0){echo 'La categoria ingresada ya existe.<br><br>';}
                                        else{
                                            $query="INSERT INTO categoria (nombre) VALUES ('$newcategory')"; #inserto la nueva categoria

                                            $resp = mysql_query($query) or die(mysql_error());

                                            $categoria = $newcategory;
                                            
                                            echo 'Se agrego la categoria:<b> ' .$categoria .'</b> correctamente<br><br>';
                                        }#fin del si no
                            }#fin del si se ingreso una nueva categoria
                            if(!empty($newauthor) && $autor = 'nuevo'){  #Se ingreso un nuevo autor?
                                
                                 $query="SELECT * FROM autores WHERE nombre = '$newauthor'";#busco si ya existe el autor dentro de la tabla autores
                                 $resp = mysql_query($query) or die(mysql_error());
                                 
                                    if(mysql_num_rows($resp) > 0) {echo 'El autor ingresado ya existe.<br><br>';}
                                        else{
                                            $query ="INSERT INTO autores (nombre) VALUES ('$newauthor')"; #inserto el nuevo autor
                                            
                                            $resp = mysql_query($query) or die(mysql_error());
                                            
                                            $autor = $newauthor;
                                            
                                            echo 'Se agrego el autor:<b> ' .$autor .'</b> correctamente<br><br>';   
                                            
                                            
                                        }#fin del si no
                            }#fin del si se ingreso un nuevo autor
                                 
                     if($autor == 'nuevo' || $categoria == 'nueva'){    
                            echo 'Ingrese correctamente el autor y la categoria<br><br>';
                            
                            }*/
                            if(!empty($imagen)){
                                $ruta = "Imagenes/";
                                $ruta = $ruta.$imagen;
                            }
                                    else{
                                        $ruta = $libro['imagen'];
                                    }
                            
                            /*$query = 'SELECT * FROM libros WHERE id_libro = '$clave'';
                            $resp = mysql_query($query) or die(echo 'Error al localizar el libro:'.mysql_error(););
                            if($resp){*/
                                $modifica = "UPDATE libros SET ISBN = '$ISBN', nombre = '$nombre', editorial = '$editorial',
                                anio = '$anio', descripcion = '$descripcion', precio = '$precio', categoria = '$categoria', autor = '$autor', imagen = '$ruta'";

                                $modificar = mysql_query($modifica) or die (mysql_error());

                                if($modificar){
                                   echo('<center>Libro modificado con Exito<br><br>');
                                  echo '<a href="libros_catalogo.php?palabra='.$libro['nombre'].'" class="link">Click aqui para ver los cambios</a></center>';

                                }


                        }

                   ?>
        </div><!--cierre de contenido-->
    </div><!--cierre de contenedor-->
    <div id="pie"><p>© Copyright 2012 Bitsionario 2012 - Todos los derechos reservados</p>
        <p>
            <a href="http://validator.w3.org/check?uri=referer"><img
            src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
            </a>
        </p>
    </div><!--Cierre de pie--> 
</body>
</html>