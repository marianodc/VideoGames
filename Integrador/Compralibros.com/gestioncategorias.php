<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
<link href="css/estilos.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<title>Gestion de Categorias</title>
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
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Gestion de Categorias</span>
  </div><!--cierre de ubicacion-->
  
  <div id="contenedor" >
    
		<div class="lateral-der">

                <?php 
                   
                    #cuando sea un administrador de la pagina
                   if (!isset($_SESSION['importe']) && isset($_SESSION['logueado'])){
                        ?>
                      <div id="carrito">
                        <center><img src="imagenes/boton-panel-decontrol.png" width="175" height="50" /></center>
                        <ul>
                          <li><a href="gestionlibros.php" class="link">Gestion de Libros</a></li>
                          <li><a href"Gestioncategorias.php" class="link">Gestion de categorias</a></li>
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
       
      <div id='acciones'>
          
        <a  href="gestioncategorias.php?agregar" name="agregar" class="boton">Agregar Categoria</a><br><br>
              <?php
                  if(isset($_GET['agregar'])){?>
                      <h2 class="titulos">Agregar una Categoria </h2>
                      <center>
                      <form action="gestioncategorias.php?agregar" method="POST">
                          Nombre categoria:&nbsp;<input type="text" size="50" name="newcategory" class="searchtext"></input><br>
                          <input  type="submit" value="Agregar" name="agregar" class="searchsubmit"></input>
                      </form>  
                      </center>
                      <br><br>
                 <?php }

                  if(isset($_POST['agregar'])){
                      extract($_REQUEST);
                        $query ="SELECT categoria FROM categorias WHERE categoria = '$newcategory'";
                              $resp = mysql_query($query) or die(mysql_error());
                        if(empty($newcategory)){echo 'Ingrese una categoria por favor'; exit; }
                            
                               else if(mysql_num_rows($resp) > 0){
                                  echo '<b>ERROR: !La categoria ingresada ya existe!<b>';
                                  exit;
                                }
                                  else{
                                      $agregar = "INSERT INTO categorias(categoria) VALUES ('$newcategory')";
                                      $query = mysql_query($agregar) or die (mysql_error());
                                      if($query){echo 'Categoria<b> '.$newcategory.' </b>agregada Correctamente<br><br>';} 

                                  }#del else

                        }#del if

              ?>
               <br>
               <a href="gestioncategorias.php?modificar" class="boton">Modificar categoria</a><br><br>
                 
                       
                  <?php
                      if(isset($_GET['modificar'])){?>
                          <h2 class="titulos">Modificar una Categoria</h2>
                          <?php
                          $query ="SELECT categoria FROM categorias";
                          $resp = mysql_query($query) or die(mysql_error());
                            if(mysql_num_rows($resp) == 0){
                              echo '<b>No existen categorias Actualmente</b><br><br>';
                            }
                              else{
                                      echo '<ul>';
                                  while($categorias = mysql_fetch_array($resp)){?>
                                         <li><?php echo $categorias['categoria'];?> <a href="gestioncategorias.php?modificar&mod=<?php echo urlencode($categorias['categoria']); ?>"class="link">Modificar</a></li><br><br>
                                      
                            <?php }
                                      echo'</ul>';
                                        if(isset($_GET['mod'])){
                                            $categoria = $_GET['mod']; ?>
                                            <center>
                                              <form action="" method="POST">
                                                  Nombre categoria:&nbsp;<input type="text" size="50" name="categorych" class="searchtext" value="<?php echo $_GET['mod']; ?>"></input><br>
                                                  <input  type="submit" value="Modificar" name="modifica" class="searchsubmit"></input>
                                              </form>  
                                            </center>
                                <?php  }
                                  
                                 
                                        if(isset($_POST['modifica'])){
                                            extract($_REQUEST);
                                            $query = "SELECT * FROM categorias WHERE categoria = '$categoria'";
                                            $resp = mysql_query($query) or die(mysql_error());
                                              if($resp){
                                                  $modifica = "UPDATE categorias SET categoria = '$categorych' WHERE categoria = '$categoria'";
                                                  $resp = mysql_query($modifica) or die(mysql_error());
                                                    if($resp){echo '<b>Categoria Modificada con exito</b><br><br>';
                                                    }
                                              
                                                      else{echo'Error';
                                                      }
                                              }

                                        }                       
                              }      
                      }
                     
                    ?>
                 <br>
                  <a href="gestioncategorias.php?eliminar" class="boton">Eliminar Categoria</a><br><br>

                      <?php
                      if(isset($_GET['eliminar'])){?>
                          <h2 class="titulos">Eliminar una categoria</h2>
                          <?php
                          $query ="SELECT categoria FROM categorias";
                          $resp = mysql_query($query) or die(mysql_error());
                            if(mysql_num_rows($resp) == 0){
                              echo '<b>No existen categorias actualmente</b>';
                            }
                              else{
                                    echo '<ul>';
                                    while($categorias = mysql_fetch_array($resp)){
                                      echo '<li>'.$categorias['categoria'].' <a href="gestioncategorias.php?eliminar&delete='.$categorias['categoria'].'" class="link">Eliminar</a></li><br><br>';
                                        if(isset($_GET['delete'])&& $_GET['delete'] == $categorias['categoria']){
                                          $categoria = $_GET['delete']; 
                                          $query ="DELETE FROM categorias WHERE categoria = '$categoria'";
                                          $borrado = mysql_query($query);
                                            if($borrado){
                                              echo ' Categoria<b>'.$categoria.'</b> borrada con exito';
                                            }
                                              else{
                                                echo 'Error al borrar categoria';
                                              }
                                        }
                                    }
                                    echo '</ul>';
                              }      
                      } ?> 


         </div><!--cierre de accicones-->      
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
