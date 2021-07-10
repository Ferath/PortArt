<?php
    // Se inicializa la sesión
    session_start();
    include 'config.php';

    // Se comprueba que haya un usuario logeado, sino lo redirige al Login.php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../login.php");
        exit;
    }
	//Cadena de consulta que me devuelve todos los registros de la tabla 'users'
	$query = "SELECT * FROM users WHERE id = ".$_SESSION["id"];
   //Se reciben los datos de la imagen subida
   $nombre_imagen=$_FILES['imagen']['name'];
   $tipo_imagen=$_FILES['imagen']['type'];
   $tamagno_imagen=$_FILES['imagen']['size'];

   if($tamagno_imagen<=1000000){
      if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png"){
         $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/portart/uploads/';
          move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
      }else{
         echo "Tipo de archivo invalido.";
      }
   }else{
      echo "Archivo demasiado pesado";
   }

  
   $link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
   // Check connection
   if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
   }

   $objetivo_imagen=fopen($carpeta_destino . $nombre_imagen, "r");

   $contenido1=fread($objetivo_imagen, $tamagno_imagen);

   $contenido1=addslashes($contenido1);

   fclose($objetivo_imagen);

   $sqlImagen = "UPDATE users SET avatar='$contenido1' WHERE id=".$_SESSION["id"];

   $resultado=mysqli_query($link,$sqlImagen);

   if(mysqli_affected_rows($link)>0){
      echo '<script language="javascript">alert("Se ha subido su imagen");</script>';
      echo '<script>window.location="../Logeado/Perfil.php";</script>';
   }else{
      echo '<script language="javascript">alert("Algo ha salido mal");</script>';
      echo '<script>window.location="../Logeado/Perfil.php";</script>';
   }
?>
