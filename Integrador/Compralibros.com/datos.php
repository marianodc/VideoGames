<?php
session_start();
//Archivo de datos que contiene nombre del servidor $serv, 
//nombre de usuario $user, password de acceso al servidor $pass 
//y base de datos principal $base.
$serv = "localhost";
$user = "root";
$pass = "";
$base = "bitsionario";
$usuarios = 'usuarios';
$libros = 'libros';

mysql_connect($serv,$user,$pass)or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db($base)or die ('Error al seleccionar la Base de Datos: '.mysql_error());

?>