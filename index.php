<?php
    // Se inicializa la sesión
    include 'includes/config.php';
    $id_autor='';
    $tipo='';
    $contenido='';
    $MostrarFotos="SELECT * FROM imagenes";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" 
      type="image/png" 
      href="Assets/imgs/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/slider.css">
    <link rel="stylesheet" href="Assets/css/btnnav.css">
    <link rel="stylesheet" href="Assets/css/normalize.css">
    <link rel="stylesheet" href="Assets/css/CardsIndex.css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <title>Bienvenido a PorArt</title>
</head>
<body>
    <header>
        <a href="index.php"><img src="Assets/imgs/logo.png" alt="" class="logo"></a>
        <nav class="menu">
                <ul class="nav_links">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="Diseño.php">Dibujos</a></li>
                    
                    <li><a href="login.php" id="login">Iniciar sesión</a></li>
                    <li><a href="register.php" id="login">Registrarse</a></li>
                    <li><img src="#" alt=""></li>
                </ul>
            </img>
        </nav>
    </header>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="Assets/imgs/slider/img1.jpg" style="width:100%">
            <div class="text">Galeria N°1</div>
        </div>
        
        <div class="mySlides fade">
            <img src="Assets/imgs/slider/img2.jpg" style="width:100%">
            <div class="text">Galeria N°2</div>
        </div>
        
        <div class="mySlides fade">
            <img src="Assets/imgs/slider/img3.jpg" style="width:100%">
            <div class="text">Galeria N°3</div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="btn-main">
            <a href="Diseño.php" class="btnpartes">Afiches</a>
            <a href="Diseño.php" class="btnpartes">Logos</a>
            <a href="Diseño.php" class="btnpartes">Banner</a>
            <a href="Diseño.php" class="btnpartes">Dibujos</a>
    </div>
    <div class="recome">
        <h3><strong class="h3diseño" >Diseños</strong> que podrian gustarte</h3>
    </div>

    <div class="container">
        <!-- Se cargan las imagenes -->
        <div class="container">
        <?php 
        //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
        if($resultado = mysqli_query($link, $MostrarFotos)):  
    
        //la variable $user contiene el contenido de $result en un array asociativo
        while($fila = mysqli_fetch_assoc($resultado)): 
            $id_autor=$fila["id_autor"];
            $contenido=$fila["contenido"];
                      
        ?>
        <div class="card">
        <?php echo "<img id='imagen' style='width:200px' src='data:image/jpg; base64,". base64_encode($contenido)."'>"; ?>
            <?php 
                //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
                $CargarNombre="SELECT id,username,tarifas FROM users WHERE id = ".$id_autor;
                if($resultado1 = mysqli_query($link, $CargarNombre)):  
            ?>
            <?php 
                //la variable $user contiene el contenido de $result en un array asociativo
                while($fila1 = mysqli_fetch_assoc($resultado1)): 
                $username=$fila1["username"];
                $id=$fila1["id"];
                $tarifas=$fila1["tarifas"];  
            ?>
            <h1><?php echo $username ?></h1>
            <?php endwhile; ?>
            <?php endif; ?> 
            <p class="price">$<?php echo $tarifas ?></p>
            <a href="VisitaPerfil.php?id=<?php echo $id ?>"><button>Ver Producto</button></a>
        </div>
        <?php 
            endwhile;
            endif; 
        ?> 
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