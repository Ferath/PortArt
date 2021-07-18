
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <link rel="stylesheet" href="Assets/css/perfil.css">
    <link rel="stylesheet" href="Assets/css/sliderPerfil.css">
    <title>Perfil</title>
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
    <main>
        <div class="div-pefil">
            <img src="Assets/imgs/perfil/businesswoman.png" class="img-perfil"><br>
            <label>Nombre usuario</label>
        </div>

        <div class="container-btns">
            <button class="btn-dropdown">Información
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>

        <div class="container-btns">
            <button class="btn-dropdown">Contacto
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>

        <div class="container-btns">
            <button class="btn-dropdown">Tarifas
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>

        <div class="container-btns">
            <button class="btn-dropdown">Reseñas
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                <a href="CarroCompras.php"> Contratar servicio / prueba </a>
            </div>
        </div>

        <div class="container-btns">
            <button class="btn-dropdown">Trabajos
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="Assets/imgs/cards/diagram.png" style="width:50%">
                        <div class="text">Caption Text</div>
                    </div>
                    
                    <div class="mySlides fade">
                        <img src="Assets/imgs/cards/faq.png" style="width:50%">
                        <div class="text">Caption Two</div>
                    </div>
                    
                    <div class="mySlides fade">
                        <img src="Assets/imgs/cards/team.png" style="width:50%">
                        <div class="text">Caption Three</div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer-main">
        <div class="div-footer">
            <h4 class="Contacto" style="cursor: pointer;"><strong style="color: #fa983a; cursor: pointer;">Contacto: </strong> lalolandia@gmail.com</h4>
            <h2>PorArt 2021</h2>
        </div>
    </footer>
    <script src="Assets/js/dropdown.js"></script>
    <script src="Assets/js/slider.js"></script>
</body>
</html>