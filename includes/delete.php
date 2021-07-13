<!DOCTYPE html>
<html>
<head>
	<title>Eliminando su cuenta</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Eliminar usuario</h3>
		<p>Esta seguro que quiere eliminar este registro permanentemente de la base de datos?</p>
		<form action="delete.php" method="post">
			<input class="btn-danger" type="submit" name="eliminar" value="Eliminar" />
			<input type="hidden" name="sw" value="1" />
			<?php if(isset($_GET['id'])): ?>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<?php endif; ?>
		</form><br />
		<a class="btn" href="indexlogeado.php"><< Volver</a>
	</div>
	<div id="wrapper">
		<h3>Eliminar FOTOS</h3>
		<p>Esta seguro que quiere eliminar LAS FOTOS SUBIDAS este registro permanentemente de la base de datos?</p>
		<form action="delete.php" method="post">
			<input class="btn-danger" type="submit" name="eliminar" value="Eliminar Fotos" />
			<input type="hidden" name="sw1" value="2" />
			<?php if(isset($_GET['id'])): ?>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<?php endif; ?>
		</form><br />
		<a class="btn" href="indexlogeado.php"><< Volver</a>
	</div>
</body>
</html>
<?php 

//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'portart');

//si el formulario fue enviado
if(isset($_POST['sw']) == 1){

	//cadena con la consulta de eliminacion segun el id de usuario
	$query = "DELETE FROM users WHERE id =".$_POST['id']; //No olvidar el WHERE en el DELETE!!
	if(mysqli_query($link, $query)){ //si la consulta devuelve un resultado
		// Destroy the session.
		session_destroy();
		header("Location: ../logeado/indexlogeado.php"); //redirecciono a indexlogeado.php
	}else{ //si hubo un error
		echo "Ocurrio un error al intentar eliminar el registro"; //mensaje de error
	}
}

if(isset($_POST['sw2']) == 2){

	//cadena con la consulta de eliminacion segun el id de usuario
	$query1 = "DELETE FROM imagenes WHERE id_autor =".$_POST['id']; //No olvidar el WHERE en el DELETE!!
	if(mysqli_query($link, $query1)){ //si la consulta devuelve un resultado
		header("Location: ../logeado/perfil.php"); //redirecciono a indexlogeado.php
	}else{ //si hubo un error
		echo "Ocurrio un error al intentar eliminar el registro"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>