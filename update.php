<?php
//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'portart');

//si existe "id" en la url 
if(isset($_GET['id'])){
	$id = $_GET['id'];//le asigno una variable 
	$query1 = "SELECT * FROM users WHERE id =".$id; //cadena de consulta para el elemento $id
	if($result = mysqli_query($link, $query1)){ //si obtengo resultados ejecutando la consulta anterior
		while($user = mysqli_fetch_assoc($result)){ //asigno ese resultado a un array asociativo $user
			$username = $user['username']; //creo variables con los nombres de los campos de la tabla "users" 
			$email = $user['email'];
			$phone = $user['phone'];
			$acercademi = $user['acercademi'];
		}
	}

}

if(isset($_POST['sw']) == 1){ //si se ha presionado el boton "Actualizar" 

	//cadena con la orden de actualizacion a la tabla "users" con los valores de los inputs enviados por POST
	$query2 = "UPDATE users SET username='".$_POST['username']."', email='".$_POST['email']."', phone='".$_POST['phone']."', acercademi='".$_POST['acercademi']."' WHERE id=".$_POST['id'];
	if(mysqli_query($link, $query2)){ //si la consulta se ejecuta con exito
		echo "La informacion se actualizo con exito"; //mensaje de exito
		header('Location: perfil.php'); //redireccion a perfil.php
	}else{ //si ocurrio un error
		echo "Ocurrio un error al intentar actualizar"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editanto tu perfil</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="formularioupdate">
		<h3>Editar usuario</h3>
		<form action="update.php" method="post">
			<label for="name">Nombre: </label><br />
			<input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>" /><br /><br />

			<label for="email">Email: </label><br />
			<input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" /><br /><br />

			<label for="phone">Telefono: </label><br />
			<input type="text" name="phone" value="<?php if(isset($phone)) echo $phone; ?>" /><br /><br />
			
			<label for="phone">Acerca de mi: </label><br />
			<input type="text" name="acercademi" value="<?php if(isset($acercademi)) echo $acercademi; ?>" /><br /><br />

			<input class="btn-success" type="submit" name="actualizar" value="Actualizar" /><br /><br />
			<a class="btn" href="perfil.php"><< Volver</a>
			<input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
			<input type="hidden" name="sw" value="1" />
		</form>
	</div>
</body>
</html>