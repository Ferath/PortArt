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
    <link rel="stylesheet" href="../Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/footer.css">
    <link rel="stylesheet" href="../Assets/css/CarroCompras.css">
    <title>Carro de Compras</title>
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
    <main>
        <div class="container-producto">
            <div class="box-title">
                <img src="../Assets/imgs/cards/diagram.png" style="width: 100px">
                <div class="box-subtitle">
                    <h3>Titulo</h3>
                    <p>"Tipo"</p><br>
                    <p>Valor: $99 clp</p>
                </div>
            </div>
            <div class="box-servicio">
                <label><input type="checkbox"> Servicio 1 (+1 día)</label>
            </div>
            <div class="box-servicio">
                <label><input type="checkbox"> Servicio 1 (+1 día)</label>
            </div>
            <div class="box-servicio">
                <label><input type="checkbox"> Servicio 1 (+1 día)</label>
            </div>
            <div class="box-servicio">
                <label><input type="checkbox"> Servicio 1 (+1 día)</label>
            </div>
            <div class="box-servicio">
                <label><input type="checkbox"> Servicio 1 (+1 día)</label>
            </div>
        </div>
            <section class="section-rigth">
                <div class="section-title">
                    <h3>Seguir comprando</h3>
                </div>
                <div class="section-detalle">
                    <h3>Detalle total</h3>
                    <p>Total: <strong>$ 9</strong></p>
                    <p>Descuento: <strong>$ 0</strong></p>
                    <p>Cargos: <strong>$ 1</strong></p><hr>
                    <p>TOTAL: <strong>$ 10</strong></p>
                    <a class="btnPedido" href="CompraF.php">Hacer Pedido</a>
                </div>
            </section>
    </main>
    <footer class="footer-main">
        <div class="div-footer">
            <h4 class="Contacto" style="cursor: pointer;"><strong style="color: #fa983a; cursor: pointer;">Contacto: </strong> lalolandia@gmail.com</h4>
            <h2>PorArt 2021</h2>
        </div>
    </footer>
</body>
</html>