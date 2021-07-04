<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <link rel="stylesheet" href="Assets/css/CompraF.css">
    <title>Compra Finalizada</title>
</head>
<body>
    <header>
        <a href="index.php"><img src="Assets/imgs/logo.png" alt="" class="logo"></a>
        <nav class="menu">
                <ul class="nav_links">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="Diseño.php">Dibujos</a></li>
                    <li><a href="logout.php" id="login">Cerrar Sesión</a></li>
                    <li><img src="#" alt=""></li>
                </ul>
            </img>
        </nav>
    </header>
    <div class="container">
        <h3>Compra Finalizada con éxito</h3>

        <div class="container-compra">
            <p>MUCHAS GRACIAS POR SU COMPRA!</p>
            <h4>Por favor haga <a href="chat.php">click aquí</a> para contactarte con el creador.</h4>
            <img src="Assets/imgs/cards/team.png">
            <h4>O contactese con el más tarde a través de su perfil.</h4>
        </div>
    </div>
    <footer class="footer-main">
        <div class="div-footer">
            <h4 class="Contacto" style="cursor: pointer;"><strong style="color: #fa983a; cursor: pointer;">Contacto: </strong> lalolandia@gmail.com</h4>
            <h2>PorArt 2021</h2>
        </div>
    </footer>
</body>
</html>