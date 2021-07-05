<?php
// Inicializa la sesión
session_start();
 
// Comprueba si hay una sesión activa, si es así lo redirige al login.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: login.php");
  exit;
}
 
// Los datos de la BD
require_once "config.php";
 

// Probando
$email = $password = "";
$email = $password = "";
$email_err = $password_err = "";

// Procesa los datos cuando son ingresados en el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Comprueba si estan vacio los datos
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor ingrese su usuario.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Comprueba si la contraseña esta vacia
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // valida los datos
    if(empty($email_err) && empty($password_err)){
        // Ejecuta el statement
        $sql = "SELECT id, username, email, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Protege los datos ingresados y comienza a realizar la carga
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Selecciona los parametros
            $param_email = $email;
            
            // Ejecuta la statement
            if(mysqli_stmt_execute($stmt)){
                // Almacena el resultado
                mysqli_stmt_store_result($stmt);
                
                // Comprueba si el nombre de usuario existe y si es así, que la contraseña corresponda al user
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Protege los datos
                    mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Si la contraseña es correcta, felicidades, te logeaste
                            session_start();
                            
                            // Variable para el inicio de sesión valido
                            $_SESSION["loggedin"] = true;
                            // Almacena el ID
                            $_SESSION["id"] = $id;
                            // Almacena el nickname del Usuario
                            $_SESSION["username"] = $username;
                            // Almacena el Correo del Usuario
                            $_SESSION["email"] = $email;  
                                                          
                            
                            // Redirige al usuario
                            header("location: indexlogeado.php");
                        } else{
                            // Muestra un error de que la contraseña no es valida
                            echo '<script language="javascript">alert("La contraseña es erronea");</script>';
                        }
                    }
                } else if(empty($email_err) && empty($password_err)){
                    // Ejecuta el statement
                    $admin = "SELECT id, username, email, password, id_rol FROM administrador WHERE email = ?";
            
                    if($stmt = mysqli_prepare($link, $admin)){
                        // Protege los datos ingresados y comienza a realizar la carga
                        mysqli_stmt_bind_param($stmt, "s", $param_email);
                        
                        // Selecciona los parametros
                        $param_email = $email;
                        
                        // Ejecuta la statement
                        if(mysqli_stmt_execute($stmt)){
                            // Almacena el resultado
                            mysqli_stmt_store_result($stmt);
                            
                            // Comprueba si el nombre de usuario existe y si es así, que la contraseña corresponda al user
                            if(mysqli_stmt_num_rows($stmt) == 1){                    
                                // Protege los datos
                                mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashed_password, $id_rol);
                                if(mysqli_stmt_fetch($stmt)){
                                    if(password_verify($password, $hashed_password)){
                                        // Si la contraseña es correcta, felicidades, te logeaste
                                        session_start();
                                        
                                        // Variable para el inicio de sesión valido
                                        $_SESSION["loggedin"] = true;
                                        // Almacena el ID
                                        $_SESSION["id"] = $id;
                                        // Almacena el USERNAME del Usuario
                                        $_SESSION["username"] = $username;
                                        // Almacena el Correo del Usuario
                                        $_SESSION["email"] = $email;
                                        // Almacena el rol del Usuario
                                        $_SESSION["id_rol"] = $id_rol;
                                                                      
                                        
                                        // Redirige al usuario
                                        header("location: indexlogeado.php");
                                    } else{
                                        // Muestra un error de que la contraseña no es valida
                                        echo '<script language="javascript">alert("La contraseña es erronea");</script>';
                                    }
                                }
                            } else{
                                // Muestra un error si el username no existe
                                echo '<script language="javascript">alert("Su usuario no existe");</script>';
                            }
                        } else{
                            echo "Algo salió mal, por favor vuelve a intentarlo.";
                        }
                    }
                    
                    // Finaliza el statement
                    mysqli_stmt_close($stmt);
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Finaliza el statement
        mysqli_stmt_close($stmt);
    }
    // Finaliza la conexión
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Inicio Sesión</title>
</head>
<body>
    <header>
        <a href="index.php"><img src="Assets/imgs/logo.png" alt="" class="logo"></a>
        <nav class="menu">
                <ul class="nav_links">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="Diseño.php">Dibujos</a></li>
                    <li><a href="login.php" id="login">Login</a></li>
                    <li><a href="register.php" id="login">Register</a></li>
                    <li><img src="#" alt=""></li>
                </ul>
            </img>
        </nav>
    </header>
    <div class="title">
        <h1>Inicio Sesión</h1>
    </div>
        <form class="box" action="" method="post" name="signin-form">
            <input type="text" name="email" placeholder="Correo"  required>
            <input type="password" autocomplete="off" id="password" name="password" placeholder="Contraseña" required>
            <input value="Mostrar Contraseña" type="button" onclick="mostrarContrasena()"></input> 
            <br>
            <label class="PassOlvidada">¿Olvidaste tu contraseña?</label>
            <input type="submit" name="login" value="Iniciar"></input>
            <a href="register.php" class="registrate">Registrate</a>
        </form>
</body>
</html>

<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>