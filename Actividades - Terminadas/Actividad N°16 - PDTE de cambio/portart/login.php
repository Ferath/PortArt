<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
        echo '<script language="javascript">';
        echo 'alert("Algo va mal, intenta nuevamente")';
        echo '</script>';
    } else {
        if (password_verify($password, $result['PASSWORD'])) {
            $_SESSION['user_id'] = $result['ID'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
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
            <input type="text" name="email" placeholder="Correo" pattern="[a-zA-Z0-9]+" required>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <label class="PassOlvidada">¿Olvidaste tu contraseña?</label>
            <input type="submit" name="login" value="Iniciar"></input>
            <a href="register.php" class="registrate">Registrate</a>
        </form>
</body>
</html>