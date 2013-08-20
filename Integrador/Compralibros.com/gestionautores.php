<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
<link href="css/estilos.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<title>Gestion de Autores</title>
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
        Ubicacion dentro del sitio web: &nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Gestion de Autores</span>
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
                          <li><a href="Gestioncategorias.php" class="link">Gestion de categorias</a></li>
                          <li><a href"Gestionautores.php" class="link">Gestion de autores</a></li>
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
          
        <a  href="gestionautores.php?agregar" name="agregar" class="boton">Agregar Autor</a><br><br>
              <?php
                  if(isset($_GET['agregar'])){?>
                      <center>
                      <form action="gestionautores.php?agregar" method="POST">
                          Nombre autor:&nbsp;<input type="text" size="50" name="newauthor" class="searchtext"></input><br>
                          <input  type="submit" value="Agregar" name="agregar" class="searchsubmit"></input>
                      </form>  
                      </center>
                 <?php }

                  if(isset($_POST['agregar'])){
                      extract($_REQUEST);
                        $query ="SELECT autor FROM autores WHERE autor = '$newauthor'";
                              $resp = mysql_query($query) or die(mysql_error());
                        if(empty($newauthor)){echo 'Ingrese un autor por favor'; exit; }
                            
                               else if(mysql_num_rows($resp) > 0){
                                  echo '<b>ERROR: !El autor ingresada ya existe!<b>';
                                  exit;
                                }
                                  else{
                                      $agregar = "INSERT INTO autores(autor) VALUES ('$newauthor')";
                                      $query = mysql_query($agregar) or die (mysql_error());
                                      if($query){echo 'Autor<b> '.$newauthor.' </b>agregado Correctamente<br><br>';} 

                                  }#del else

                        }#del if

              ?>
               <br>
               <a href="gestionautores.php?modificar" class="boton">Modificar autor</a><br><br>
                 
                       
                  <?php
                      if(isset($_GET['modificar'])){
                          $query ="SELECT autor FROM autores";
                          $resp = mysql_query($query) or die(mysql_error());
                            if(mysql_num_rows($resp) == 0){
                              echo '<b>No existen autores Actualmente</b><br><br>';
                            }
                              else{
                                  echo'<ul>';
                                  while($autores = mysql_fetch_array($resp)){?>
                                      <li><?php echo $autores['autor'];?> <a href="gestionautores.php?modificar&mod=<?php echo urlencode($autores['autor']); ?>"class="link">Modificar</a></li><br><br>
                            <?php }    
                                  echo'</ul>';
                                        if(isset($_GET['mod'])){
                                            $autor = $_GET['mod']; ?>
                                            <center>
                                              <form action="" method="POST">
                                                  Nombre autor:&nbsp;<input type="text"  name="authorch" class="searchtext" value="<?php echo $autor; ?> "></input><br>
                                                  <input  type="submit" value="Modificar" name="modifica" class="searchsubmit"></input>
                                              </form>  
                                            </center>
                                <?php  
                                        }
                                 
                                        if(isset($_POST['modifica'])){
                                            
                                            extract($_REQUEST);
                                            $query = "SELECT * FROM autores WHERE autor = '$autor'";
                                            $resp = mysql_query($query) or die('<u>Error al buscar:</u>'.mysql_error());
                                              if($resp){
                                                  $modifica = "UPDATE autores SET autor = '$authorch' WHERE autor = '$autor'";
                                                  $resp = mysql_query($modifica) or die ('Error al buscar el registro'. mysql_error());
                                                    if($resp){echo '<b>Autor Modificado con exito</b><br><br>';
                                                    }
                                              
                                                      else{echo'Error';
                                                      }
                                              }

                                        }                       
                              }      
                      }
                     
                    ?>
                  <br>
                  <a href="gestionautores.php?eliminar" class="boton">Eliminar Autor</a><br><br>

                      <?php
                      if(isset($_GET['eliminar'])){
                          $query ="SELECT autor FROM autores";
                          $resp = mysql_query($query) or die(mysql_error());
                            if(mysql_num_rows($resp) == 0){
                              echo '<b>No existen autores actualmente</b>';
                            }
                              else{
                                    while($autores = mysql_fetch_array($resp)){
                                      echo $autores['autor'].' <a href="gestionautores.php?eliminar&delete='.$autores['autor'].'" class="link">Eliminar</a><br><br>';
                                        if(isset($_GET['delete'])&& $_GET['delete'] == $autores['autor']){
                                          $autor = $_GET['delete']; 
                                          $query ="DELETE FROM autores WHERE autor = '$autor'";
                                          $borrado = mysql_query($query);
                                            if($borrado){
                                              echo ' Autor<b> '.$autor.' </b> borrado con exito <br><br>';
                                            }
                                              else{
                                                echo 'Error al borrar autor';
                                              }
                                        }
                                    }
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
