<?php
 
include('config.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    

    $query = $connection->prepare("SELECT * FROM administrador WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<script language="javascript">';
        echo 'alert("Este correo se encuentra registrado, pruebe otro.")';
        echo '</script>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(id_rol, USERNAME, PASSWORD, EMAIL, PHONE) VALUES (2,:username,:password_hash,:email,:phone)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        
        $result = $query->execute();
 
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Tu registro fue exitoso")';
            echo '</script>';
            header("location: index.php");
        } else {
            echo '<script language="javascript">';
            echo 'alert("Algo va mal, intenta nuevamente")';
            echo '</script>';
        }
    }
    sleep(1);
    if (isset($_POST['register'])) {
        $username = (string)$_POST['username'];
    
        $result = $link->query(
            'SELECT * FROM users WHERE username = "'.strtolower($username).'"'
        );
 
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger"><strong>Oh no!</strong> Nombre de usuario no disponible.</div>';
    } else {
        echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
    }
    }
}
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/login.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {	
            $('#username').on('blur', function() {
                $('#result-username').html('<img src="images/loading.gif" />').fadeOut(1000);
            
                var username = $(this).val();		
                var dataString = 'username='+username;
   
                $.ajax({
                    type: "POST",
                    url: "includes/check_username_availablity.php",
                    data: dataString,
                    success: function(data) {
                        $('#result-username').fadeIn(1000).html(data);
                    }
                });
            });
                        
        });    
    </script>

    <title>Crear Cuenta</title>
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
        <h1>Creación de Cuenta</h1>
    </div>

        <form method="post" class="box" action="" name="signup-form">
            <input type="text" id="username" name="username" placeholder="Nombre de Usuario" pattern="[a-zA-Z0-9]+" required />
            <div id="result-username"></div>
            <input type="text" name="email" placeholder="Correo" required />
            <input type="text" name="phone" maxlength="9" placeholder="Telefono" pattern="[0-9]+" required/>
            <input type="password" name="password" minlength="3" id="passwd" placeholder="Contraseña" required/>
            <input type="password" equalTo="password" name="password2" minlength="3" id="passwd2" placeholder="Confirmar Contraseña" required/><br>
            <label><input type="checkbox" name="termsCond" required> Al registrarse, acepta los <strong style="color:#fa983a">terminos y condiciones.</strong></label>
            <div id="info"></div>
            <input type="submit" name="register" value="Registrarse"></input>
        </form>
        
</body>
</html>
