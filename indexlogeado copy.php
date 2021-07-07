<?php
    // Se inicializa la sesión
    session_start();
    include 'config.php';
    // Se comprueba que haya un usuario logeado, sino lo redirige al Login.php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login.php");
        exit;
    }
    if($_SESSION["id_rol"]==1){
        include("includes/navadmin.php");
    }else{
        include("includes/navbar.php");
    }
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

    
    <div class="container">
        <?php 
        //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
            if($resultado = mysqli_query($link, $MostrarFotos)):  
        ?>

        <?php 
            //la variable $user contiene el contenido de $result en un array asociativo
            while($fila = mysqli_fetch_assoc($resultado)): 
                $id_autor=$fila["id_autor"];
                $contenido=$fila["contenido"];
                $tipo=$fila["tipo"];  
                      
        ?>
        <?php 
            //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
                $CargarNombre="SELECT * FROM users";
                if($resultado = mysqli_query($link, $CargarNombre)):  
            ?>
        <div class="card">
        <?php echo "<img id='imagen' style='width:200px' src='data:image/jpg; base64,". base64_encode($contenido)."'>"; ?>
            
            <?php 
            //la variable $user contiene el contenido de $result en un array asociativo
            while($fila1 = mysqli_fetch_assoc($resultado)): 
                $id=$fila1["id"];    
                $username=$fila1["username"];    
            ?>
            <h1><?php echo $username ?></h1>;
            <h1></h1>
            <p class="price">$19.99</p>
            <?php echo "<a href=Perfil.php?id=$id><button>Ver Producto</button></a>"?>
            <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <?php endwhile; ?>
        <?php endif; ?> 
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