<?php
include('datos.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/gal_estilos.css" type="text/css" rel="stylesheet" />
  <link href="css/estilos.css" type="text/css" rel="stylesheet" />
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
  <title>Terminos de uso</title>
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
        Ubicacion dentro del sitio web:&nbsp;-&nbsp;Home&nbsp;-&nbsp;<span>Terminos de uso</span>
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
                          <li><a href="Gestionlibros.php" class="link">Gestion de Libros</a></li>
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
        
<h1>Aviso Legal</h1>

Para dar cumplimiento a lo establecido en la Ley 34/2002 de 11 de Julio, de Servicios de la Sociedad de la Informacin y de Comercio Electrnico (LSSICE), a continuacin se indican los datos de informacin general del sitio web www.Bitsionario.com:

El sitio web www.bitsionario.com recoge informacin de la actividad llevada a cabo por Libros como Bitsionario S.L. (en adelante BITSIONARIO): CIF B-92.391.341. Inscrita en el Registro Mercantil n 5 de Corrientes, Tomo 3171, Libro 2084, Folio 140, Seccin 8, Hoja MA-59458 Domicilio Social: Pedro Dominguez 1524, 16 29005 Argentina

<h1>Utilizacin del sitio web</h1>

El sitio web www.bitsionario.com es ofrecido con fines informativos, as como para facilitar la adquisicin de libros on line. LIBRERA LUCES podr dejar de prestar los servicios ofrecidos en este sitio web, lo que no acarrear ninguna obligacin legal para con el usuario o terceros.

<h1>Privacidad</h1>

La informacin que LIBRERA BITSIONARIO recaba de los usuarios de este sitio web se utiliza exclusivamente para facilitar a los interesados la adquisicin on line del libro solicitado.

<h1>Uso de Cookies</h1>

El servidor de LIBRERA BITSIONARIO enva al ordenador del cliente un fichero (denominado cookie) con el objeto de ejecutar los procesos de compra. La utilizacin de estas cookies es necesaria para la prestacin del servicio. En caso de que el usuario tenga desactivada la ejecucin de este procedimiento no ser posible la prestacin del servicio de compra online.

<h1>Vnculos a Terceros</h1>

En el caso de vnculos a sitios de terceros, el usuario pasar a estar regido por los Trminos de Uso y Poltica de Privacidad del nuevo sitio, aceptando que LIBRERA BITSIONARIO no ser responsable ni tendr obligacin legal por el uso de tales sitios.

<h1>Derechos de Autor</h1>

Todos los textos e imgenes contenidos en el sitio web poseen derechos de autor y no pueden ser reproducidos, en su totalidad o parte, sin autorizacin escrita de sus propietarios legales.

<h1>Modificaciones de los Trminos de Uso y Poltica de Privacidad</h1>

LIBRERA BITSIONARIO se reserva el derecho a modificar sus Trminos de Uso y Poltica de Privacidad cuando lo considere adecuado. El usuario se obliga a revisar el contenido de estos Trminos de Uso y Poltica de Privacidad, ya que los mismos pueden ser modificados sin previo aviso. Asimismo, comprende y acepta todas y cada una de las clusulas contenidas en el presente documento. Es de la entera responsabilidad del usuario revisar los trminos antes mencionados.

<h1>Condiciones Generales de Compra.</h1>

<h2>3.1. Generalidades</h2>
Estas condiciones generales de venta son las nicas aplicables y reemplazan cualquier otra condicin general, excepto en caso de anulacin previa, expresa y escrita. LIBRERA BITSIONARIO puede ocasionalmente modificar los artculos de sus trminos o condiciones generales, por lo que es aconsejable que stas sean ledas en cada visita al sitio Web. Estas modificaciones son atribuibles a partir de su publicacin en Internet y no podrn aplicarse a los contratos concluidos anteriormente. Cada compra en la pgina Web se rige por las condiciones generales aplicables en la fecha del pedido, por lo que una vez efectuado dicho pedido, se entender que acepta sin reservas nuestras condiciones generales de venta tras haberlas ledo.
Accediendo al sitio Web, usted se compromete a hacer un uso responsable del sitio Web y a respetar las Condiciones Generales.
La informacin que figura en los catlogos y las listas de precios es slo a titulo indicativo. Los precios pueden as variar en funcin de las condiciones econmicas, teniendo a los clientes informados puntualmente de las variaciones que se produzcan a travs del sitio Web. En todo caso, se respetarn los precios fijados por las editoriales o proveedores como marca la ley vigente.

<h2>3.2. Pedidos</h2>
Los pedidos podrn formularse a travs de la pgina de compra de nuestro sitio Web, por telfono, fax o correo electrnico.
Pedido Web. Pueden efectuar pedidos los clientes una vez registrados como particulares o como empresas. Las caractersticas de los productos y sus precios aparecern en pantalla. Una vez seleccionado el producto o productos que desea no tiene ms que pinchar sobre el icono de bolsa de la compra (como ya le hemos explicado anteriormente), e inmediatamente podr ver el importe en la parte superior derecha de la Web. Dicho importe aparece sin gastos de envo ni descuentos, as que hasta el ultimo punto del proceso que confirmacin pedido no podr saber con exactitud el coste de la operacin.
Una vez seleccionados todos los productos que desee, pinchando sobre <strong>"Ver detalle"</strong>, le aparecer un breve listado con los productos seleccionados, en el que podr si lo desea aumentar al nmero de unidades de su pedido, o eliminar productos que definitivamente no le interesen.
Para continuar con el siguiente paso pulse en "Tramitar pedido". Si todava no esta identificado o le ha caducado la sesin le conduce al rea de identificacin. Si es cliente registrado en nuestra Web no tiene ms que introducir sus datos de identificacin, y en caso contrario, puede realizar el registro, tanto si es un particular como una empresa.
El tercer paso consiste en la seleccin de la forma de envo y de pago que prefiera. En algunos casos, y debido a circunstancias como lugar de envo, peso de los productos o volumen de los mismos, solo aparecern disponibles las formas de envo y pago que se adapten a esos productos en concreto. Nosotros podemos informarle en estos casos de cul es la mejor forma de envo y de pago.
Finalmente le aparecer un resumen del pedido con todos los datos de envo y facturacin que nos haya indicado, as como el importe final segn las opciones escogidas. Podr volver atrs y seleccionar diversas formas para ajustarse a lo que desee. Cuando pulse sobre "Enviar pedido" o "Realizar pago" y este se realice correctamente, el pedido se considerar cerrado, sin posibilidad de modificacin directa, y usted recibir un correo-e con el detalle del mismo.

Pedido telefnico. Si le resulta ms cmodo, puede tambin realizarnos un pedido va telefnica. Llamando a cualquiera de los telfonos 976 354 165  976 306 861. Es necesario que nos facilite todos los datos necesarios para poder realizar el envo de los productos y emitir la factura correspondiente. En este caso, en lo referente a la forma de pago quedar excluido el pago con tarjeta de crdito.

Pedido por Fax o correo electrnico. Puede realizar su pedido a travs de fax al nmero 976 351 043 o por correo-e a info@Bitsionario.com o pedidos@Bitsionario.com. En ese caso es igualmente necesario que nos facilite todos los datos para poder realizar el envo de los productos y emitir la factura correspondiente.En lo referente a la forma de pago quedar excluido el pago con tarjeta de crdito.

<h2>3.3 Informacin sobre los productos y servicios</h2>
Librera Bitsionario se reserva el derecho a modificar la oferta comercial presentada en el sitio Web (modificaciones sobre productos, precios, promociones y otras condiciones comerciales y de servicio) en cualquier momento.
Hacemos un gran esfuerzo para que la informacin contenida en el sitio Web, sea ofrecida de forma veraz y sin errores tipogrficos. En el caso que en algn momento se produjera algn error de este tipo, ajeno en todo momento a la voluntad de Librera Bitsionario, se procedera inmediatamente a su correccin. De existir un error tipogrfico en alguno de los precios mostrados y algn cliente hubiera tomado una decisin de compra basada en dicho error, le comunicaremos al cliente dicho error y rescindiremos la compra del cliente sin ningn coste por su parte.
Los contenidos del sitio Web podran, en ocasiones, mostrar informacin provisional sobre algunos productos. En el caso que la informacin facilitada no correspondiera a las caractersticas del producto el cliente tendr derecho a rescindir su compra sin ningn coste por su parte.

<h2>3.4. Precio y forma de pago</h2>
<h3>3.4.1.</h3> Los precios facturados al Cliente por los productos llevan incluidos los impuestos vigentes y los gastos de transporte.
<h3>3.4.2.</h3> La venta al cliente de productos o servicios se realizar por el precio y condiciones ofrecidos en cada caso. De no ser as, se ajustar al cumpliento de la legalidad vigente.
<h3>3.4.3.</h3> Los medios de pago posibles para satisfacer a LIBRERA Bitsionario las cantidades referidas en el punto (3.2) sern los determinados en cada caso y segn las condiciones particulares aplicables.
<h3>3.4.4.</h3> El pago de las cantidades referidas en el punto (3.1) sern satisfechas con arreglo a los trminos pactados en cada caso y segn las condiciones particulares aplicables o, subsidiariamente, al contado.
<h3>3.4.5.</h3> En caso de impago, se repercutirn todos los gastos ocasionados, tanto financieros como de cualquier otro tipo.
<h3>3.4.6 Formas de pago.</h3>
Pago en tienda. Puede realizar el pago en el momento en que recoja su pedido en el punto de recogida indicado. Siempre que sea posible, le facilitaremos un lugar de recogida al objeto de hacer ms rpida la misma.
Contra reembolso. Siempre que el destino sea dentro de argentina. Para cualquier otro destino que no sea Argentina no se admite esa forma de pago, debido a que los operadores logsticos no aplican ese servicio.
El pago se efectuar al contado en el momento de entrega del pedido a la compaa de transportes que realiza la entrega.

<h1>3.5. Devoluciones y Condiciones de Desistimiento</h1>
Librera Bitsionario, S.A. se compromete a suministrar los productos de acuerdo con las caractersticas y los precios que se indican en la Web, salvo error u omisin. Todos los precios figuran en pesos e incluyen el Impuesto sobre el Valor Aadido (IVA). En caso de error tipogrfico, Librera Bitsionario, S.A. comunicar el error al cliente. ste tendr de derecho a decidir entre cambiar el producto o anular el pedido, sin ningn coste por su parte.
Si no queda satisfecho con los productos adquiridos en este sitio Web, dispone de un plazo de siete das dentro del cual podr devolverlo (a contar desde la fecha de recepcin del producto). Los costes de devolucin, corren a cargo del cliente, (segn Ley del 15/1/96 nmero 7/1996).
Las devoluciones deben remitirse a la direccion de la empresa encargada
Librera Bitsionario, S.A. no acepta envos a portes debidos.
No se abonar el importe de dicha devolucin o realizar ningn reenvo del producto en s, mientras no se haya comprobado la recepcin y el estado del producto objeto de la devolucin. En el caso de ser admitida la devolucin Librera Central, S.A. reintegrar el importe al cliente dentro de los 15 das siguientes a la aceptacin de la devolucin, satisfecho mediante el sistema que indique el cliente. Excluyendo de dicho importe la parte proporcional de los gastos de envo ocasionados.
No se admitirn devoluciones que no vengan en su embalaje original y con el producto en perfecto estado. Los productos que puedan ser reproducidos o copiados con carcter inmediato, (discos compactos, DVD, software, pelculas de vdeo, libros, etc.) no se admitirn a no ser que se devuelvan en su embalaje original y sin abrir, exceptuando los casos de mercanca defectuosa.
La factura sellada por LIBRERA BITSIONARIO, tiene validez como garanta del fabricante, sta tendr efecto a partir del da que se realiza la entrega en el domicilio del comprador.
Las reclamaciones por posibles incidencias como que el producto se entregue deteriorado, averiado, equivocado, o por cualquier otra causa susceptible de reclamacin, las atendern en nuestro departamento de Atencin al Cliente y se le indicar como proceder.
La anulacin de un pedido, puede realizarlo mientras no se haya efectuado el envo del mismo. En caso contrario, se compromete a recibir el pedido y seguir el procedimiento de devolucin anteriormente citado.
En el caso que se produzca una devolucin por motivos ajenos a nuestra causa, contactaremos con usted al objeto de averiguar las razones de la devolucin.

<h2>3.6. Garantas</h2>
En los productos que usted puede adquirir y estn sujetos a posibles garantas, no se incluyen las deficiencias ocasionadas por negligencias, golpes, uso o manipulaciones indebidas, ni materiales sometidos a desgaste por uso normal.
En aquellas incidencias que justifiquen el uso de la garanta, se optar por la reparacin, sustitucin, rebaja o devolucin, en los trminos legalmente establecidos.
El comprador ser responsable, salvo que se indique lo contrario, de los gastos de transporte, telefnicos, correos y otros gastos ocurridos durante el periodo de garanta. 
10. Modificaciones en el sitio Web, en los servicios y en los contenidos.
LIBRERA BITSIONARIO se reserva el derecho a modificar unilateralmente y en cualquier momento, sin previo aviso, la presentacin y contenido del sitio Web, sus servicios y las condiciones generales de uso. Dichas modificaciones sern para mejorar la pgina, mejorando simultneamente los servicios ofrecidos al usuario. Por cuanto antecede, LIBRERA BITSIONARIO le ruega encarecidamente que proceda a la revisin y comprobacin de las condiciones generales de uso, cada una de las veces que acceda al sitio Web, siendo de su propia responsabilidad el no hacerlo y suponiendo ello que, aun as, acepta tcitamente el contenido de las mismas.

<h1>11. Terminacin.</h1>
Si bien, en principio, la duracin de este sitio Web es indeterminada, LIBRERA BITSIONARIO se reserva el derecho a suspender o dar por terminada la prestacin de algunos o todos de sus servicios, sin que esta decisin deba ser comunicada con antelacin a los usuarios del mismo.

<h1>12. Ley y jurisdiccin aplicables.</h1>
Las presentes condiciones generales de uso se rigen por las Leyes Argentinas. Cualquier controversia en relacin con el sitio Web de LIBRERA BITSIONARIO se sustanciar ante la jurisdiccin espaola.


<h1>3. Responsabilidades.</h1>
El incumplimiento de las presentes condiciones generales de uso, o la utilizacin del sitio Web de DOMINIOLC en trminos contrarios a los establecidos, dar lugar a la exigencia de las responsabilidades derivadas de cuanto antecede, mediante el ejercicio de las acciones judiciales que LIBRERA BITSIONARIO estime pertinentes en cada momento.<br />


 Librera Bitsionario, S.A. 2012. Todos los derechos reservados. 

    	</div><!--cierre de contenido-->
   	</div><!--cierre de contenedor-->
      <div id="contacto"><p><span style="font-size:24px; color: #FFF; font-weight:bold;">Direccion:</span><br>Pais: Argentina <br><br> Ciudad: Corrientes <br><br> Correo:compralibros@gmail.com<br /><br />Telefono: (0379)44258733</p>
          <div style="position:relative; left:450px; bottom:175px;"><span style="font-size:24px; color: #FFF; font-weight:bold; margin:auto;">Seguinos:</span><br /><img src="imagenes/facebook.png" /><a href="http://www.facebook.com" target="_blank"> Facebook </a><br />
            <img src="imagenes/twitter.png" /><a href="http://www.twitter.com" target="_blank">Twitter</a><br />
          </div>
        </div><!--contacto-->
   
	<div id="pie"><p> Copyright 2012 CompraLibros.com 2012 - Todos los derechos reservados</p>
        <p>
            <a href="http://validator.w3.org/check?uri=referer"><img
            src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="80" />
            </a>
        </p>
 
    </div><!--Cierre de pie-->


</body>
</html>
