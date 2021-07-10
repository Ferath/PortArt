<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
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
    <a href="indexlogeado.php"><img src="../Assets/imgs/logo.png" alt="" class="logo"></a></img>
    <nav class="menu">
        <ul class="nav_links">
            <li class="item"><a href="indexlogeado.php">Inicio</a></li>
            <li class="item"><a href="diseñologeado.php">Dibujos</a></li>
            <li class="item"><a href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
            <ul class="desple">
                <li><a class="subItem" href="Perfil.php?id=<?php echo $_SESSION["username"]; ?>">Perfil</a></li>
                <li><a class="subItem" href="../includes/logout.php" id="login">Cerrar Sesión</a></li>
            </ul>
            </li>
            <li class="item"><img src="#" alt=""></li>
        </ul>
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