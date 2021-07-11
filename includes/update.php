<?php
	//conexion a bbdd, recuerden que hay dos. $link y $connect
	$link = mysqli_connect('localhost', 'root', '', 'portart');
	session_start();
    include 'config.php';

    // Se comprueba que haya un usuario logeado, sino lo redirige al Login.php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
	//si existe "id" en la url 
	if(isset($_SESSION["id"])){
		$id = $_SESSION["id"];//le asigno una variable 
		$query1 = "SELECT * FROM users WHERE id =".$id; //cadena de consulta para el elemento $id
		if($result = mysqli_query($link, $query1)){ //si obtengo resultados ejecutando la consulta anterior
			while($user = mysqli_fetch_assoc($result)){ //asigno ese resultado a un array asociativo $user
				$username = $user['username']; //creo variables con los nombres de los campos de la tabla "users" 
				$email = $user['email'];
				$phone = $user['phone'];
				$tarifas = $user['tarifas'];
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
	<link rel="stylesheet" href="../Assets/css/update.css">
</head>
<body>
	<!-- Aqui esta el formulario para hacer el update, ojo no cambiar los datos "NAME",etc -->
	<div id="formularioupdate">
        <form action="update.php" method="post" class="formulario">
            <h3><?php echo $username?>, estas editando tu perfil</h3>
            <label for="name">Nombre</label><br />
            <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>" /><br /><br />

            <label for="email">Email</label><br />
            <input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" /><br /><br />

            <label for="phone">Telefono</label><br />
            <input type="text" name="phone" value="<?php if(isset($phone)) echo $phone; ?>" /><br /><br />

            <label for="phone">Tarifas</label><br />
            <input type="text" name="tarifas" value="<?php if(isset($tarifas)) echo $tarifas; ?>" /><br /><br />

            <label for="phone">Acerca de mi: </label><br />
            <textarea type="text" rows=5 cols=35 name="acercademi"><?php if(isset($acercademi)) echo $acercademi; ?></textarea> <br /><br />

            <input class="btn-success" type="submit" name="actualizar" value="Actualizar" /><br>
            <input type="reset" value="Cancelar cambios">

            <br /><br />
            <a class="btn" href="perfil.php"><< Volver</a>
            <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
            <input type="hidden" name="sw" value="1" />
        </form>
    </div>
</body>
</html>