<?php
session_start();

echo 'Agregue un nuevo libro:';?>

<center>
<FORM action="agregalibro.php" method="post">
	ISBN:

	<input type="text" name="ISBN" maxlength="20"></input><br>

	Nombre:

	<input type="text" name="nombre" maxlength="50"></input><br>

	Editorial:

	<input type="text" name="editorial" maxlength="50"></input><br>

	Año:

	<input type="text" name="año" maxlength="4"> </input><br>

	Descripcion:

	<textarea name="descripcion" rows="10"></textarea><br>

	Precio:

	<textarea type="text" name="precio" ></input><br>
</FORM>
</center>

