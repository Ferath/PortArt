<?php
    // Se inicializa la sesión
    session_start();

    // Se comprueba que haya un usuario logeado, sino lo redirige al Login.php
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
    <link rel="stylesheet" href="Assets/css/slider.css">
    <link rel="stylesheet" href="Assets/css/btnnav.css">
    <link rel="stylesheet" href="Assets/css/normalize.css">
    <link rel="stylesheet" href="Assets/css/CardsIndex.css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <title>PorArt</title>
</head>
<body>
    <?php 
        include"includes/navbar.php";
    ?>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="Assets/imgs/slider/img1.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>
        
        <div class="mySlides fade">
            <img src="Assets/imgs/slider/img2.jpg" style="width:100%">
            <div class="text">Caption Two</div>
        </div>
        
        <div class="mySlides fade">
            <img src="Assets/imgs/slider/img3.jpg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="btn-main">
            <a href="#" class="btnpartes">Afiches</a>
            <a href="#" class="btnpartes">Logos</a>
            <a href="#" class="btnpartes">Banner</a>
            <a href="Diseño.html" class="btnpartes">Dibujos</a>
    </div>
    <div class="recome">
        <h3><strong class="h3diseño" >Diseños</strong> que podrian gustarte</h3>
    </div>
    <div class="recome" id="Recome">
        <h3><strong class="h3diseño" >Diseños</strong> que podrian gustarte</h3>
    </div>
    <div class="container">
        <div class="card">
            <img src="Assets/imgs/cards/worldwide.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.99</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
        <div class="card">
            <img src="Assets/imgs/cards/sent.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.91</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
        <div class="card">
            <img src="Assets/imgs/cards/target.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.99</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
        <div class="card">
            <img src="Assets/imgs/cards/faq.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.99</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
        <div class="card">
            <img src="Assets/imgs/cards/diagram.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.99</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
        <div class="card">
            <img src="Assets/imgs/cards/team.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.99</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
        <div class="card">
            <img src="Assets/imgs/cards/watch.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.99</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
        <div class="card">
            <img src="Assets/imgs/cards/pyramid-chart.png" alt="Denim Jeans" style="width:100%">
            <h1>User name</h1>
            <p class="price">$19.99</p>
            <a href="Perfil.php"><button>Ver Producto</button></a>
        </div>
    </div>
    
    <footer class="footer-main">
        <div class="div-footer">
            <h4 class="Contacto" style="cursor: pointer;"><strong style="color: #fa983a; cursor: pointer;">Contacto: </strong> lalolandia@gmail.com</h4>
            <h2>PorArt 2021</h2>
        </div>
    </footer>
    <script src="Assets/js/slider.js"></script>
</body>
</html>